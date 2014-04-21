<?php

/* add.html */
class __TwigTemplate_2c7f75a87e02ea2acea2337ee70f45d9d6a9237002734b6f62a72cfed7d1fa6b extends Twig_Template
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
        echo "<h1>Add Account</h1>
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "


";
        // line 11
        $context["form"] = $this->env->loadTemplate("form.html");
        // line 12
        echo "
<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("password-add-save"), "html", null, true);
        echo "\">


    ";
        // line 16
        if ((twig_length_filter($this->env, (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors"))) > 0)) {
            // line 17
            echo "    <div class=\"form-group\">
        <label class=\"col-sm-2 control-label\">Fehler:</label>
        <div class=\"col-sm-4\">

                ";
            // line 21
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
            foreach ($context['_seq'] as $context["_key"] => $context["field_error"]) {
                // line 22
                echo "                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["field_error"]) ? $context["field_error"] : $this->getContext($context, "field_error")));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 23
                    echo "                        <p class=\"bg-warning\">";
                    echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
                    echo "</p>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 25
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "        </div>
    </div>
    ";
        }
        // line 29
        echo "






    <div class=\"form-group ";
        // line 36
        echo $context["form"]->getprint_error_class("title", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "\">
        <label for=\"input_title\" class=\"col-sm-2 control-label\">Title</label>
        <div class=\"col-sm-4\">
            <input type=\"text\" name=\"title\" class=\"form-control\" id=\"input_title\" placeholder=\"\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
        echo "\"/>
            ";
        // line 40
        echo $context["form"]->getprint_error("title", (isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
        echo "
        </div>
    </div>

    <div class=\"form-group\">
        <label for=\"input_descr\" class=\"col-sm-2 control-label\">Description</label>
        <div class=\"col-sm-4\">
            <textarea name=\"descr\" class=\"form-control\" id=\"input_descr\" >";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "desc"), "html", null, true);
        echo "</textarea>
        </div>
    </div>

    <div class=\"form-group\">
        <label for=\"input_url\" class=\"col-sm-2 control-label\">Address</label>
        <div class=\"col-sm-4\">
            <input type=\"text\" name=\"url\" class=\"form-control\" id=\"input_url\" placeholder=\"\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), "html", null, true);
        echo "\">
        </div>
    </div>

    <div class=\"form-group\">
        <label for=\"input_username\" class=\"col-sm-2 control-label\">Username</label>
        <div class=\"col-sm-4\">
            <input type=\"text\"  name=\"username\" class=\"form-control\" id=\"input_username\" placeholder=\"\" value=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "username"), "html", null, true);
        echo "\">
        </div>
    </div>

    <div class=\"form-group\">
        <label for=\"input_password\" class=\"col-sm-2 control-label\">Password</label>
        <div class=\"col-sm-4\">
            <input type=\"password\"  name=\"password\" class=\"form-control\" id=\"input_password\" placeholder=\"\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "password"), "html", null, true);
        echo "\">
        </div>
    </div><div class=\"form-group\">
        <div class=\"col-sm-2\"></div>
        <div class=\"col-sm-4\">
            <button type=\"submit\" class=\"btn btn-success\">Add account</button>

        </div>
    </div>


</form>

";
    }

    public function getTemplateName()
    {
        return "add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 68,  142 => 61,  132 => 54,  122 => 47,  112 => 40,  108 => 39,  102 => 36,  93 => 29,  88 => 26,  82 => 25,  73 => 23,  68 => 22,  64 => 21,  58 => 17,  56 => 16,  50 => 13,  47 => 12,  45 => 11,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
