<?php

/* detail.html */
class __TwigTemplate_9d09fbc855fee79b7c54cb5b58a18c43dabcfeda6597e90a4723921ddf8882dc extends Twig_Template
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
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"row\">
  <div class=\"col-md-2\">Title:</div>
  <div class=\"col-md-2\">
    <a href=\"#\" id=\"title\">";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
        echo "</a>
  </div>
</div>
<div class=\"row\">
  <div class=\"col-md-2\">Description:</div>
  <div class=\"col-md-2\">
    <a href=\"#\" id=\"description\">";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "description"), "html", null, true);
        echo "</a>
  </div>
</div>
<div class=\"row\">
  <div class=\"col-md-2\">URL:</div>
  <div class=\"col-md-2\">
    <a href=\"#\" id=\"url\">";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), "html", null, true);
        echo "</a>
  </div>
</div>
<div class=\"row\">
  <div class=\"col-md-2\">Username:</div>
  <div class=\"col-md-2\">
    <a href=\"#\" id=\"username\">";
        // line 29
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
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "password"), "html", null, true);
        echo "</pre></p>
    
        <a class=\"btn btn-warning\" href=\"#\" id=\"view_password\" role=\"button\">Change password &raquo;</a>
 </div>

    


  </div>
</div>
";
    }

    // line 51
    public function block_extra_javascript($context, array $blocks = array())
    {
        // line 52
        echo "
<script>//turn to inline mode
    \$(document).ready(function() {
      var url = '";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("account-edit-ajax"), "html", null, true);
        echo "';
      \$('#title').editable({
        type: 'text',
        pk: ";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo ",
        url: url,
        title: 'Enter title'
      });
      \$('#url').editable({
        type: 'text',
        pk: ";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo ",
        url: url,
        title: 'Enter url'
      });      
      \$('#description').editable({
        type: 'text',
        pk: ";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo ",
        url: url,
        title: 'Enter description'
      });
      \$('#username').editable({
        type: 'text',
        pk: ";
        // line 76
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
        return "detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 76,  134 => 70,  125 => 64,  116 => 58,  110 => 55,  105 => 52,  102 => 51,  87 => 38,  75 => 29,  66 => 23,  57 => 17,  48 => 11,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
