<?php

/* login.html */
class __TwigTemplate_662b060059e7d31d770b3c518704a690f02f0d7efd76c9da1e3eede25b3ce46d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'jumbotron' => array($this, 'block_jumbotron'),
            'content' => array($this, 'block_content'),
            'extra_javascript' => array($this, 'block_extra_javascript'),
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
        echo "<h1>Login</h1>
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
";
        // line 9
        $context["form"] = $this->env->loadTemplate("form.html");
        // line 10
        echo "
<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("login-save"), "html", null, true);
        echo "\">


    ";
        // line 14
        if ((twig_length_filter($this->env, (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors"))) > 0)) {
            // line 15
            echo "    <div class=\"form-group has-warning\">
        <label class=\"col-sm-2 control-label\">Warning:</label>
        <div class=\"col-sm-4\">
            <p class=\"bg-warning\">Please fix some small issues with your input.</p>
        </div>
    </div>
    ";
        }
        // line 22
        echo "
    <div class=\"form-group ";
        // line 23
        echo $context["form"]->getprint_error_class("username", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_username\" class=\"col-sm-2 control-label\">Username</label>
        <div class=\"col-sm-4\">
            <input type=\"text\"  name=\"username\" class=\"form-control\" id=\"input_username\" placeholder=\"\" value=\"\">
            ";
        // line 27
        echo $context["form"]->getprint_error("username", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group ";
        // line 31
        echo $context["form"]->getprint_error_class("password", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_password\" class=\"col-sm-2 control-label\">Password</label>
        <div class=\"col-sm-4\">
            <input type=\"password\"  name=\"password\" class=\"form-control\" id=\"input_password\" placeholder=\"\" value=\"\">
            ";
        // line 35
        echo $context["form"]->getprint_error("password", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>




    <div class=\"form-group\">
        <div class=\"col-sm-2\"></div>
        <div class=\"col-sm-4\">
            <button type=\"submit\" class=\"btn btn-success\">Login</button>

        </div>
    </div>


</form>

";
    }

    // line 56
    public function block_extra_javascript($context, array $blocks = array())
    {
        // line 57
        echo "
<script>//turn to inline mode
\$(document).ready(function() {

    \$('#generate_password').click(function(){
        event.preventDefault();
        \$(\"#password_suggestions\").show();
        \$(\"#generate_password\").hide();

    });

});
</script>
";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 57,  113 => 56,  90 => 35,  83 => 31,  76 => 27,  69 => 23,  66 => 22,  57 => 15,  55 => 14,  49 => 11,  46 => 10,  44 => 9,  41 => 8,  38 => 7,  33 => 4,  30 => 3,);
    }
}
