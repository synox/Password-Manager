<?php

namespace PasswordManager\Controller;

use PasswordManager\Crypto;
use PasswordManager\Permission;
use PasswordManager\Persistence\AccountPersistence;
use Valitron\Validator;


/**
 * Controller for managing account informatione. Input is validated and passwords are encrypted.
 * The User has to be signed on the use these actions. See parent class for method checkLogin().
 *
 * @package PasswordManager\Controller
 */
class AccountController extends ProtectedController {

    /**
     * List of accounts.
     */
    public function indexAction() {
        $this->checkLogin();
        $persistence = new AccountPersistence($this->app->pdo);

        $accounts = $persistence->listAll(Permission::getUserid());
        $this->render('account/list.html', array('accounts' => $accounts));
    }

    /**
     * Detail View for one account.
     * @param $account_id id of the account
     */
    public function viewAction($account_id) {
        $this->checkLogin();

        $persistence = new AccountPersistence($this->app->pdo);
        // only accounts of the current user are shown. Else it returns a notFound.
        $account = $persistence->get($account_id, Permission::getUserid());
        if ($account == null) {
            $this->app->notFound();
        }

        // decrypt password
        $account->password = Crypto::decryptInformation($account->password_cipher, Permission::getPassword());

        $this->render('account/view.html', array('account' => $account));
    }

    /**
     * Edit the account.
     *
     * Depending on the request type (get/post) the form is displayed. The use can only see his own accounts.
     * @param $account_id id of the account
     */
    public function editAction($account_id) {
        $this->checkLogin();

        if ($this->app->request->getMethod() == "GET") {
            $persistence = new AccountPersistence($this->app->pdo);
            $account = $persistence->get($account_id, Permission::getUserid());
            $account->password = Crypto::decryptInformation($account->password_cipher, Permission::getPassword());
            $this->editForm($account);
        } else {
            $this->editSave($account_id);
        }
    }

    /**
     * Saves an edit-form on a post request.
     * @param $account_id id of account
     */
    private function editSave($account_id) {
        // create account instance from request params
        $account = \PasswordManager\Model\Account::fromParams($this->app->request->params());
        $account->id = $account_id;


        // validate form
        $v = new Validator($this->app->request->params());
        $v->rule('required', ['title', 'url', 'username', 'password']);
        $v->rule('url', 'url')->message('Wrong format. Should start with http://');
        $v->labels(array(
            'url' => 'Address',
        ));

        if ($v->validate()) {

            // if the form is valid, data can be saved.
            $persistence = new AccountPersistence($this->app->pdo);

            // encrypt password
            $account->password_cipher = Crypto::encryptInformation($account->password, Permission::getPassword());
            if ($account_id == 'new') {
                // 'new' is used if adding a new account instead of editing existing.
                $persistence->persist(Permission::getUserid(), $account);
            } else {
                // change existing. Check permission:
                if (!$persistence->isAccountOfUser($account_id, Permission::getUserid())) {
                    // account not found or wrong user
                    $this->app->log->error("wrong user: account.id=$account_id, current user_id=" . Permission::getUserid());
                    $this->app->notFound();
                }
                $persistence->save(Permission::getUserid(), $account);
            }

            $this->app->flash('message', "Account information has been saved.");
            $this->app->redirect($this->app->urlFor("Account:index"));
        } else {
            // Show validation errors
            $this->app->view->appendData(array('form_errors' => $v->errors()));

            // Render
            $this->app->view->appendData(array('example_passwords' => Crypto::generatePasswords(5)));
            $this->app->render('account/edit.html', array('account' => $account, 'mode' => 'edit'));
        }
    }

    /**
     * Shows the form to edit an account.
     * @param $account account object
     */
    private function editForm($account) {
        // there are no form errors
        $this->app->view->appendData(array('form_errors' => array()));
        // generate the example passwords
        $this->app->view->appendData(array('example_passwords' => Crypto::generatePasswords(5)));
        $this->app->render('account/edit.html', array('account' => $account));
    }

    /**
     * action to add a new account. Almost the same as editing an existing account.
     */
    public function addAction() {
        $this->checkLogin();

        $account = new \PasswordManager\Model\Account();
        $account->id = 'new';
        $this->editForm($account);
    }

    /**
     * action to delete an account.
     * @param $account_id id of account
     */
    public function deleteAction($account_id) {
        $this->checkLogin();

        // returns "not found" if id is invalid or does not existing (using the current user)
        if ($account_id == null) {
            $this->app->notFound();
        } else {
            $persistence = new AccountPersistence($this->app->pdo);
            $result = $persistence->delete($account_id, Permission::getUserid());
            if (!$result) {
                $this->app->notFound();
            } else {
                $this->app->flash("message", "Account was deleted.");
                $this->app->redirect($this->app->urlFor("Account:index"));
            }
        }
    }


}