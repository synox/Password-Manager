<?php

/* 404.html */
class __TwigTemplate_bb25ea5d271f7348eee7bf344dd2fac730a25700032fa8d57816e1b77ccc0f8a extends Twig_Template
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
        echo "<h1>Ooops, file not found!</h1>
<p>You found on an invalid link. Go back and try again. </p>
";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "        <p>If the Problem persists, contact us. </p>
";
    }

    public function getTemplateName()
    {
        return "404.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 9,  38 => 8,  32 => 4,  29 => 3,);
    }
}
