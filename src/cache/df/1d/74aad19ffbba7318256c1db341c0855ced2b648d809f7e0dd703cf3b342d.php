<?php

/* account/detail.html */
class __TwigTemplate_df1d74aad19ffbba7318256c1db341c0855ced2b648d809f7e0dd703cf3b342d extends Twig_Template
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
        echo "<h1>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
        echo "</h1>
<p>
<a class=\"btn btn-default\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Account:editForm", array("id" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"))), "html", null, true);
        echo "\" role=\"button\">Edit Information &raquo;</a>
</p>
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "<div class=\"row\">
  <div class=\"col-md-2\">Title:</div>
  <div class=\"col-md-2\">
    <a href=\"#\" id=\"title\">";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
        echo "</a>
  </div>
</div>
<div class=\"row\">
  <div class=\"col-md-2\">Description:</div>
  <div class=\"col-md-2\">
    <a href=\"#\" id=\"description\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "description"), "html", null, true);
        echo "</a>
  </div>
</div>
<div class=\"row\">
  <div class=\"col-md-2\">URL:</div>
  <div class=\"col-md-2\">
    <a href=\"#\" id=\"url\">";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), "html", null, true);
        echo "</a>
  </div>
</div>
<div class=\"row\">
  <div class=\"col-md-2\">Username:</div>
  <div class=\"col-md-2\">
    <a href=\"#\" id=\"username\">";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "username"), "html", null, true);
        echo "</a>
  </div>
</div>
<div class=\"row\">
  <div class=\"col-md-2\">Password:</div>
  <div class=\"col-md-2\">
    <a class=\"btn btn-default\" href=\"#\" id=\"view_password\" role=\"button\">View password &raquo;</a>
 
      <div id=\"password_plaintext\">
    <p> <pre>";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "password"), "html", null, true);
        echo "</pre></p>
     </div>

    


  </div>
</div>
";
    }

    // line 52
    public function block_extra_javascript($context, array $blocks = array())
    {
        // line 53
        echo "
<script>//turn to inline mode
    \$(document).ready(function() {
      var url = '";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Account:editAjax"), "html", null, true);
        echo "';
      \$('#title').editable({
        type: 'text',
        pk: ";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo ",
        url: url,
        title: 'Enter title'
      });
      \$('#url').editable({
        type: 'text',
        pk: ";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo ",
        url: url,
        title: 'Enter url'
      });      
      \$('#description').editable({
        type: 'text',
        pk: ";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo ",
        url: url,
        title: 'Enter description'
      });
      \$('#username').editable({
        type: 'text',
        pk: ";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo ",
        url: url,
        title: 'Enter username'
      });

\$('#view_password').click(function(){
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
        return "account/detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 77,  138 => 71,  129 => 65,  120 => 59,  114 => 56,  109 => 53,  106 => 52,  93 => 41,  81 => 32,  72 => 26,  63 => 20,  54 => 14,  49 => 11,  46 => 10,  39 => 6,  33 => 4,  30 => 3,);
    }
}
