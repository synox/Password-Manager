<?php

/* index.html */
class __TwigTemplate_1dcb193452d8b07b8b131ed8344729f45de816afcb628ca2ec6b5995d1140f64 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'jumbotron' => array($this, 'block_jumbotron'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_jumbotron($context, array $blocks = array())
    {
        // line 4
        echo "<h1><i class=\"fa fa-lock fa-2x\"></i> Secure Password Manager</h1>

<p>This is a simple password manager, that stores the password <strong>encrypted</strong>. It also works on your smartphone or tablet.</p>
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "<div class=\"row\">
    <div class=\"col-md-4\">
        <h2><i class=\"fa fa-key\"></i> Password Generator</h2>

        <p>You can generate random secure passwords</p>

        <p><a class=\"btn btn-default\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Pwgen:gen"), "html", null, true);
        echo "\" role=\"button\">View details &raquo;</a></p>
    </div>
    <div class=\"col-md-4\">
        <h2><i class=\"fa fa-lock\"></i> Encryption</h2>

        <p>The data is encrypted with your password. Only you can access your data!</p>
    </div>
    <div class=\"col-md-4\">
        <h2><i class=\"fa fa-bolt\"></i> Register now!</h2>

        <p>Very simple to use. </p>

        <p><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("User:register"), "html", null, true);
        echo "\" class=\"btn btn-info\" role=\"button\"><span
                class=\"glyphicon glyphicon-pencil\"></span> Register</a></p>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 29,  50 => 17,  42 => 11,  39 => 10,  32 => 4,  29 => 3,);
    }
}
