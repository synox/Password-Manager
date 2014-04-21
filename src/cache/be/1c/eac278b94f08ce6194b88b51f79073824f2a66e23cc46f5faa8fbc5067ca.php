<?php

/* user/settings.html */
class __TwigTemplate_be1ceac278b94f08ce6194b88b51f79073824f2a66e23cc46f5faa8fbc5067ca extends Twig_Template
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
        echo "<h2><i class=\"fa fa-cogs\"></i> Settings</h2>
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
";
        // line 9
        $context["form"] = $this->env->loadTemplate("macro/form.html");
        // line 10
        echo "
<h2>Change password</h2>
<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("User:changePw"), "html", null, true);
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
        // line 23
        echo "
    <div class=\"form-group ";
        // line 24
        echo $context["form"]->getprint_error_class("username", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"old_password\" class=\"col-sm-2 control-label\">Current password</label>

        <div class=\"col-sm-4\">
            <input type=\"password\" name=\"old_password\" class=\"form-control\" id=\"old_password\" placeholder=\"\" value=\"\">
            ";
        // line 29
        echo $context["form"]->getprint_error("old_password", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group ";
        // line 33
        echo $context["form"]->getprint_error_class("password", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"new_password\" class=\"col-sm-2 control-label\">New password</label>

        <div class=\"col-sm-4\">
            <input type=\"password\" name=\"new_password\" class=\"form-control\" id=\"new_password\" placeholder=\"\" value=\"\">
            ";
        // line 38
        echo $context["form"]->getprint_error("new_password", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group\">
        <div class=\"col-sm-2\"></div>
        <div class=\"col-sm-4\">
            <button type=\"submit\" class=\"btn btn-success\">Change password</button>

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
        return "user/settings.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 57,  113 => 56,  93 => 38,  85 => 33,  78 => 29,  70 => 24,  67 => 23,  57 => 15,  55 => 14,  50 => 12,  46 => 10,  44 => 9,  41 => 8,  38 => 7,  33 => 4,  30 => 3,);
    }
}
