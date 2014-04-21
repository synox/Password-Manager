<?php

/* account/edit.html */
class __TwigTemplate_23a1f0f5adb3b1b757e99a073996dc2471556990cc06429565b72036d6f30e55 extends Twig_Template
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
        if (($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id") == "new")) {
            // line 5
            echo "<p>Add account</p>
";
        } else {
            // line 7
            echo "<p>Edit account</p>
";
        }
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "
";
        // line 13
        $context["form"] = $this->env->loadTemplate("macro/form.html");
        // line 14
        echo "
<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Account:edit", array("id" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"))), "html", null, true);
        echo "\">

    ";
        // line 17
        if ((twig_length_filter($this->env, (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors"))) > 0)) {
            // line 18
            echo "    <div class=\"form-group has-warning\">
        <label class=\"col-sm-2 control-label\">Warning:</label>

        <div class=\"col-sm-4\">
            <p class=\"bg-warning\">Please fix some small issues with your input.</p>
            ";
            // line 31
            echo "
        </div>
    </div>
    ";
        }
        // line 35
        echo "

    <div class=\"form-group ";
        // line 37
        echo $context["form"]->getprint_error_class("title", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_title\" class=\"col-sm-2 control-label\">Title</label>

        <div class=\"col-sm-4\">
            <input type=\"text\" name=\"title\" class=\"form-control\" id=\"input_title\" placeholder=\"\"
                   value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
        echo "\"/>
            ";
        // line 43
        echo $context["form"]->getprint_error("title", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group ";
        // line 47
        echo $context["form"]->getprint_error_class("description", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_desc\" class=\"col-sm-2 control-label\">Description</label>

        <div class=\"col-sm-4\">
            <textarea name=\"description\" class=\"form-control\" id=\"input_desc\">";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "description"), "html", null, true);
        echo "</textarea>
            ";
        // line 52
        echo $context["form"]->getprint_error("description", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group ";
        // line 56
        echo $context["form"]->getprint_error_class("url", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_url\" class=\"col-sm-2 control-label\">Address</label>

        <div class=\"col-sm-4\">
            <input type=\"text\" name=\"url\" class=\"form-control\" id=\"input_url\" placeholder=\"\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), "html", null, true);
        echo "\">
            ";
        // line 61
        echo $context["form"]->getprint_error("url", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group ";
        // line 65
        echo $context["form"]->getprint_error_class("username", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_username\" class=\"col-sm-2 control-label\">Username</label>

        <div class=\"col-sm-4\">
            <input type=\"text\" name=\"username\" class=\"form-control\" id=\"input_username\" placeholder=\"\"
                   value=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "username"), "html", null, true);
        echo "\">
            ";
        // line 71
        echo $context["form"]->getprint_error("username", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group ";
        // line 75
        echo $context["form"]->getprint_error_class("password", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_password\" class=\"col-sm-2 control-label\">Password</label>

        <div class=\"col-sm-4\">
            <input type=\"password\" name=\"password\" class=\"form-control\" id=\"input_password\" placeholder=\"\"
                   value=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "password"), "html", null, true);
        echo "\">
            ";
        // line 81
        echo $context["form"]->getprint_error("password", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
        <div class=\"col-sm-2\">
            <a class=\"btn btn-default\" href=\"#\" id=\"generate_password\" role=\"button\">Generate password &raquo;</a>
        </div>

    </div>

    <div class=\"form-group\" id=\"password_suggestions\">
        <div class=\"col-sm-2\"></div>
        <div class=\"col-sm-4\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">Password suggestions</h3>
                </div>
                <div class=\"panel-body password_suggestion\">
                    ";
        // line 97
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["example_passwords"]) ? $context["example_passwords"] : $this->getContext($context, "example_passwords")));
        foreach ($context['_seq'] as $context["_key"] => $context["password"]) {
            // line 98
            echo "                    <p>
                    <pre>";
            // line 99
            echo twig_escape_filter($this->env, (isset($context["password"]) ? $context["password"] : $this->getContext($context, "password")), "html", null, true);
            echo "</pre>
                    </p>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['password'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "                </div>
            </div>

        </div>
    </div>

    <div class=\"form-group\">
        <div class=\"col-sm-2\"></div>
        <div class=\"col-sm-4\">
            <button type=\"submit\" class=\"btn btn-success\">
                <span class=\"glyphicon glyphicon-save\"></span> Save changes
            </button>

        </div>
    </div>


</form>

";
    }

    // line 124
    public function block_extra_javascript($context, array $blocks = array())
    {
        // line 125
        echo "
<script>//turn to inline mode
\$(document).ready(function () {

    \$('#generate_password').click(function (event) {
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
        return "account/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 125,  224 => 124,  201 => 102,  192 => 99,  189 => 98,  185 => 97,  166 => 81,  162 => 80,  154 => 75,  147 => 71,  143 => 70,  135 => 65,  128 => 61,  124 => 60,  117 => 56,  110 => 52,  106 => 51,  99 => 47,  92 => 43,  88 => 42,  80 => 37,  76 => 35,  70 => 31,  63 => 18,  61 => 17,  56 => 15,  53 => 14,  51 => 13,  48 => 12,  45 => 11,  39 => 7,  35 => 5,  33 => 4,  30 => 3,);
    }
}
