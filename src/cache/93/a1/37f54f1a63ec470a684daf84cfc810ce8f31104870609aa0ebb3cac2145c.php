<?php

/* account/list.html */
class __TwigTemplate_93a137f54f1a63ec470a684daf84cfc810ce8f31104870609aa0ebb3cac2145c extends Twig_Template
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
        echo "<p>Here is a list of your accounts: 
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<table class=\"table table-striped\">
      <thead>
        <tr>
          <th>Ttile</th>
          <th>URL</th>
          <th>Description</th>
          <th>Username</th>
          <th>Password</th>
        </tr>
      </thead>
      <tbody>
      ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["accounts"]) ? $context["accounts"] : $this->getContext($context, "accounts")));
        foreach ($context['_seq'] as $context["_key"] => $context["account"]) {
            // line 20
            echo "        <tr>
          <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
            echo "</td>
          <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), "html", null, true);
            echo "</td>
          <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "description"), "html", null, true);
            echo "</td>
          <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "username"), "html", null, true);
            echo "</td>
          <td>    <p><a href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("account-detail", array("id" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"))), "html", null, true);
            echo "\" class=\"btn btn-default\"   role=\"button\">View details &raquo;</a>
        </tr>
       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['account'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "      </tbody>
    </table>
";
    }

    public function getTemplateName()
    {
        return "account/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 28,  76 => 25,  72 => 24,  68 => 23,  64 => 22,  60 => 21,  57 => 20,  53 => 19,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
