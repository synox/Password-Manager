
# Installation 

Requirements: 

* PHP, Version 5.3.0
* Apache 2
* [Composer](https://getcomposer.org/doc/00-intro.md#globally) (PHP Package Manager)

Installation: 
	
* Clone this repository
* Create a symlink from the ``htdocs`` to the ``public`` directory: `` ln -s /path/to/project/src/public /path/to/htdocs/password-manager`` 
* Download dependencies: 

		cd path/to/project/src
		composer install
* Create a database and import the files ``structure.sql`` and ``demo_data.sql``.  Change the database settings in ``app/Init.php``. 

* Start apache and test if it works. e.g. http://localhost/password-manager/

On errors, consult the logfiles. You can also configure slim to show errors in the browser: 

		$app = new \SlimController\Slim(array(
		(...)
	    'debug' => true




