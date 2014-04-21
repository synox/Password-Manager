<?php

/* user/register.html */
class __TwigTemplate_e144601d26f0522e5859133417edd75779bf31a7f7e670f033d7c5d366753676 extends Twig_Template
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
        echo "<h2>Register</h2>
<p>In just one step you can register an account and start managing your passwords. </p>
";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "
";
        // line 10
        $context["form"] = $this->env->loadTemplate("macro/form.html");
        // line 11
        echo "
<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("User:register"), "html", null, true);
        echo "\">


    ";
        // line 15
        if ((twig_length_filter($this->env, (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors"))) > 0)) {
            // line 16
            echo "    <div class=\"form-group has-warning\">
        <label class=\"col-sm-2 control-label\">Warning:</label>

        <div class=\"col-sm-4\">
            <p class=\"bg-warning\">Please fix some small issues with your input.</p>
        </div>
    </div>
    ";
        }
        // line 24
        echo "
    <div class=\"form-group ";
        // line 25
        echo $context["form"]->getprint_error_class("username", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_username\" class=\"col-sm-2 control-label\">Username</label>

        <div class=\"col-sm-4\">
            <input type=\"text\" name=\"username\" class=\"form-control\" id=\"input_username\" placeholder=\"\"
                   value=\"";
        // line 30
        if (array_key_exists("username", $context)) {
            echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "html", null, true);
        }
        echo "\">
            ";
        // line 31
        echo $context["form"]->getprint_error("username", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group ";
        // line 35
        echo $context["form"]->getprint_error_class("password", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_password\" class=\"col-sm-2 control-label\">Password</label>

        <div class=\"col-sm-4\">
            <input type=\"password\" name=\"password\" class=\"form-control\" id=\"input_password\" placeholder=\"\" value=\"\">
            ";
        // line 40
        echo $context["form"]->getprint_error("password", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group\">
        <div class=\"col-sm-2\"></div>
        <div class=\"col-sm-4\">
            <button type=\"submit\" class=\"btn btn-info\">Register</button>

        </div>
    </div>


</form>

";
    }

    // line 58
    public function block_extra_javascript($context, array $blocks = array())
    {
        // line 59
        echo "
<script>//turn to inline mode
\$(document).ready(function () {

    \$('#generate_password').click(function () {
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
        return "user/register.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 59,  120 => 58,  100 => 40,  92 => 35,  85 => 31,  79 => 30,  71 => 25,  68 => 24,  58 => 16,  56 => 15,  50 => 12,  47 => 11,  45 => 10,  42 => 9,  39 => 8,  33 => 4,  30 => 3,);
    }
}
