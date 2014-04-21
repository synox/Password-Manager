<?php

/* account/list.html */
class __TwigTemplate_ca3621d4fa725a826477692f683d06323aac51f0a7358490be43a95802bd8a28 extends Twig_Template
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
        echo "<p>These are your accounts.
    <a class=\"btn btn-success\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Account:add"), "html", null, true);
        echo "\" role=\"button\">
        <i class=\"fa fa-plus-circle\"></i> Add account</a>

    ";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "
    ";
        // line 12
        if ((twig_length_filter($this->env, (isset($context["accounts"]) ? $context["accounts"] : $this->getContext($context, "accounts"))) == 0)) {
            // line 13
            echo "<div class=\"row\">
    <div class=\"col-md-8\">
        <h2>Welcome to your accounts</h2>

        <p>The list is currently empty.</p>

        <p>
            <a class=\"btn btn-success\" href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Account:add"), "html", null, true);
            echo "\" role=\"button\">
                <i class=\"fa fa-plus-circle\"></i> Add account</a>

        </p>
    </div>

</div>


";
        } else {
            // line 30
            echo "


<div class=\"row\">
    ";
            // line 34
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["accounts"]) ? $context["accounts"] : $this->getContext($context, "accounts")));
            foreach ($context['_seq'] as $context["_key"] => $context["account"]) {
                // line 35
                echo "        <div class=\"col-sm-4 list-item well\">
            <a href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Account:view", array("id" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"))), "html", null, true);
                echo "\">
                <h4>";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "title"), "html", null, true);
                echo " <small>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "description"), "html", null, true);
                echo "</small></h4> </a>
                <p>";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "username"), "html", null, true);
                echo " @
                    ";
                // line 39
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url")) >= 20)) {
                    // line 40
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), 0, 20), "html", null, true);
                    echo "...
                    ";
                } else {
                    // line 42
                    echo "                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "url"), "html", null, true);
                    echo "
                    ";
                }
                // line 44
                echo "                </p>
                <p>
                    <a href=\"";
                // line 46
                echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Account:view", array("id" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"))), "html", null, true);
                echo "\" class=\"btn btn-default\" role=\"button\">
                        <i class=\"fa fa-search-plus\"></i> View details</a>
                </p>

        </div>

<!--
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><p>
    </tr>
    -->
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['account'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "</div>

";
        }
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
        return array (  139 => 61,  118 => 46,  114 => 44,  108 => 42,  102 => 40,  100 => 39,  96 => 38,  90 => 37,  86 => 36,  83 => 35,  79 => 34,  73 => 30,  60 => 20,  51 => 13,  49 => 12,  46 => 11,  43 => 10,  35 => 5,  32 => 4,  29 => 3,);
    }
}
