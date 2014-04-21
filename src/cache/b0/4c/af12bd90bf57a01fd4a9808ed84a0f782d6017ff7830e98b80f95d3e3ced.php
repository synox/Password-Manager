<?php

/* pwgen/list.html */
class __TwigTemplate_b04caf12bd90bf57a01fd4a9808ed84a0f782d6017ff7830e98b80f95d3e3ced extends Twig_Template
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
        echo "<h2>Password Generator</h2>

<p>Here are some freshly generated passwords.</p>
";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "
";
        // line 11
        $context["form"] = $this->env->loadTemplate("macro/form.html");
        // line 12
        echo "

<div class=\"row\">
    <div class=\"col-md-4\">
        ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["example_passwords"]) ? $context["example_passwords"] : $this->getContext($context, "example_passwords")));
        foreach ($context['_seq'] as $context["_key"] => $context["password"]) {
            // line 17
            echo "        <p>
        <pre>";
            // line 18
            echo twig_escape_filter($this->env, (isset($context["password"]) ? $context["password"] : $this->getContext($context, "password")), "html", null, true);
            echo "</pre>
        </p>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['password'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "

    </div>
</div>


";
    }

    public function getTemplateName()
    {
        return "pwgen/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 21,  60 => 18,  57 => 17,  53 => 16,  47 => 12,  45 => 11,  42 => 10,  39 => 9,  32 => 4,  29 => 3,);
    }
}
