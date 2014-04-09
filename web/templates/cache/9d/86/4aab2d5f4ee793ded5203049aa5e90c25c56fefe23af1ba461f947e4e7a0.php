<?php

/* list.html */
class __TwigTemplate_9d864aab2d5f4ee793ded5203049aa5e90c25c56fefe23af1ba461f947e4e7a0 extends Twig_Template
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
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "descr"), "html", null, true);
            echo "</td>
          <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "username"), "html", null, true);
            echo "</td>
          <td>   <p><a class=\"btn btn-default\" href=\"#\" role=\"button\">View details &raquo;</a></p></td>
        </tr>
       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['account'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "      </tbody>
    </table>

\t<div class=\"row\">
\t ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["accounts"]) ? $context["accounts"] : $this->getContext($context, "accounts")));
        foreach ($context['_seq'] as $context["_key"] => $context["account"]) {
            // line 33
            echo "\t  <div class=\"col-md-4\">
          <h2><a href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
            echo "</a></h2>
          <p>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "descr"), "html", null, true);
            echo " </p>
          <p><a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("password-detail", array("id" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"))), "html", null, true);
            echo "\" class=\"btn btn-default\"   role=\"button\">View details &raquo;</a>

        </div>
       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['account'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 40,  105 => 36,  101 => 35,  95 => 34,  92 => 33,  88 => 32,  82 => 28,  72 => 24,  68 => 23,  64 => 22,  60 => 21,  57 => 20,  53 => 19,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
