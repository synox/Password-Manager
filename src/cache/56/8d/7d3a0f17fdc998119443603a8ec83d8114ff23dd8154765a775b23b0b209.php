<?php

/* account/edit.html */
class __TwigTemplate_568d7d3a0f17fdc998119443603a8ec83d8114ff23dd8154765a775b23b0b209 extends Twig_Template
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
        echo "<h1>Add Account</h1>
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
<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("account-add"), "html", null, true);
        echo "\">


    ";
        // line 14
        if ((twig_length_filter($this->env, (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors"))) > 0)) {
            // line 15
            echo "    <div class=\"form-group has-warning\">
        <label class=\"col-sm-2 control-label\">Warning:</label>
        <div class=\"col-sm-4\">
            <p class=\"bg-warning\">Please fix some small issues with your input.</p>
            ";
            // line 27
            echo "
        </div>
    </div>
    ";
        }
        // line 31
        echo "

    <div class=\"form-group ";
        // line 33
        echo $context["form"]->getprint_error_class("title", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_title\" class=\"col-sm-2 control-label\">Title</label>
        <div class=\"col-sm-4\">
            <input type=\"text\" name=\"title\" class=\"form-control\" id=\"input_title\" placeholder=\"\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
        echo "\"/>
            ";
        // line 37
        echo $context["form"]->getprint_error("title", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group ";
        // line 41
        echo $context["form"]->getprint_error_class("description", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_desc\" class=\"col-sm-2 control-label\">Description</label>
        <div class=\"col-sm-4\">
            <textarea name=\"description\" class=\"form-control\" id=\"input_desc\" >";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "description"), "html", null, true);
        echo "</textarea>
            ";
        // line 45
        echo $context["form"]->getprint_error("description", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group ";
        // line 49
        echo $context["form"]->getprint_error_class("url", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_url\" class=\"col-sm-2 control-label\">Address</label>
        <div class=\"col-sm-4\">
            <input type=\"text\" name=\"url\" class=\"form-control\" id=\"input_url\" placeholder=\"\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), "html", null, true);
        echo "\">
            ";
        // line 53
        echo $context["form"]->getprint_error("url", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group ";
        // line 57
        echo $context["form"]->getprint_error_class("username", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_username\" class=\"col-sm-2 control-label\">Username</label>
        <div class=\"col-sm-4\">
            <input type=\"text\"  name=\"username\" class=\"form-control\" id=\"input_username\" placeholder=\"\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "username"), "html", null, true);
        echo "\">
            ";
        // line 61
        echo $context["form"]->getprint_error("username", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group ";
        // line 65
        echo $context["form"]->getprint_error_class("password", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_password\" class=\"col-sm-2 control-label\">Password</label>
        <div class=\"col-sm-4\">
            <input type=\"password\"  name=\"password\" class=\"form-control\" id=\"input_password\" placeholder=\"\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "password"), "html", null, true);
        echo "\">
            ";
        // line 69
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
        // line 85
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["example_passwords"]) ? $context["example_passwords"] : $this->getContext($context, "example_passwords")));
        foreach ($context['_seq'] as $context["_key"] => $context["password"]) {
            // line 86
            echo "                    <p><pre>";
            echo twig_escape_filter($this->env, (isset($context["password"]) ? $context["password"] : $this->getContext($context, "password")), "html", null, true);
            echo "</pre></p>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['password'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "                </div>
            </div>

        </div>
    </div>


    <div class=\"form-group\">
        <div class=\"col-sm-2\"></div>
        <div class=\"col-sm-4\">
            <button type=\"submit\" class=\"btn btn-success\">Add account</button>

        </div>
    </div>


</form>

";
    }

    // line 109
    public function block_extra_javascript($context, array $blocks = array())
    {
        // line 110
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
        return "account/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 110,  205 => 109,  183 => 88,  174 => 86,  170 => 85,  151 => 69,  147 => 68,  141 => 65,  134 => 61,  130 => 60,  124 => 57,  117 => 53,  113 => 52,  107 => 49,  100 => 45,  96 => 44,  90 => 41,  83 => 37,  79 => 36,  73 => 33,  69 => 31,  63 => 27,  57 => 15,  55 => 14,  49 => 11,  46 => 10,  44 => 9,  41 => 8,  38 => 7,  33 => 4,  30 => 3,);
    }
}
