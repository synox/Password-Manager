<?php

/* account/view.html */
class __TwigTemplate_8ffd89ea75ba5d5ad75df3724c2bb125fd71cd4074c247cad442366b553c033e extends Twig_Template
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
        echo "<p>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
        echo "</p>
<a class=\"btn btn-primary\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Account:edit", array("id" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"))), "html", null, true);
        echo "\" role=\"button\">
    <i class=\"fa fa-pencil-square-o\"></i> Edit this &raquo;</a>

<button class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#delete-confirmation\">
    <i class=\"fa fa-trash-o\"></i> Delete this
</button>

<!-- Modal -->
<div class=\"modal fade\" id=\"delete-confirmation\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                <h4 class=\"modal-title\" id=\"myModalLabel\">Sure?</h4>
            </div>
            <div class=\"modal-body\">
                Do you really want to delete the account information for <strong>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), "html", null, true);
        echo ")</strong>?
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                <a class=\"btn btn-danger\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Account:delete", array("id" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"))), "html", null, true);
        echo "\" role=\"button\">
                    <i class=\"fa fa-trash-o\"></i> Delete Account Information &raquo;</a>
            </div>
        </div>
    </div>
</div>

";
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
        // line 35
        echo "<div class=\"form-horizontal\">
    <div class=\"form-group\">
        <label class=\"col-sm-2 control-label\">Title</label>

        <div class=\"col-sm-4\">
            ";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
        echo "
        </div>
    </div>

    <div class=\"form-group\">
        <label class=\"col-sm-2 control-label\">Description</label>

        <div class=\"col-sm-4\">
            ";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "description"), "html", null, true);
        echo "
        </div>
    </div>

    <div class=\"form-group\">
        <label class=\"col-sm-2 control-label\">Address</label>

        <div class=\"col-sm-4\">
            ";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), "html", null, true);
        echo "
        </div>
        <div class=\"col-sm-4\">
            <a class=\"btn btn-default\" href=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), "html", null, true);
        echo "\" role=\"button\">Open website &raquo;</a>
        </div>
    </div>

    <div class=\"form-group\">
        <label class=\"col-sm-2 control-label\">Username</label>

        <div class=\"col-sm-4\">
            ";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "username"), "html", null, true);
        echo "
        </div>
    </div>

    <div class=\"form-group\">
        <label class=\"col-sm-2 control-label\">Password</label>

        <div class=\"col-sm-4\">
            <a class=\"btn btn-default\" href=\"#\" id=\"view_password\" role=\"button\"><i class=\"fa fa-eye\"></i> View password</a>

            <div id=\"password_plaintext\">
                <pre>";
        // line 78
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "password"), "html", null, true);
        echo "</pre>
            </div>

        </div>


    </div>
</div>

";
    }

    // line 90
    public function block_extra_javascript($context, array $blocks = array())
    {
        // line 91
        echo "
<script>//turn to inline mode
\$(document).ready(function () {
    \$('#view_password').click(function (event) {
        event.preventDefault();
        \$(\"#password_plaintext\").show();
        \$(\"#view_password\").hide();

    });

});
</script>
";
    }

    public function getTemplateName()
    {
        return "account/view.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 91,  155 => 90,  141 => 78,  127 => 67,  116 => 59,  110 => 56,  99 => 48,  88 => 40,  81 => 35,  78 => 34,  66 => 25,  57 => 21,  38 => 5,  33 => 4,  30 => 3,);
    }
}
