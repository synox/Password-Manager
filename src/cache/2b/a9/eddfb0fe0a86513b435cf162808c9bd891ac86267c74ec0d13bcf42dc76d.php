<?php

/* macro/navigation.html */
class __TwigTemplate_2ba9eddfb0fe0a86513b435cf162808c9bd891ac86267c74ec0d13bcf42dc76d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
    }

    // line 1
    public function getisActivePage($_pagename = null, $_router = null)
    {
        $context = $this->env->mergeGlobals(array(
            "pagename" => $_pagename,
            "router" => $_router,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            // line 3
            echo "    ";
            ob_start();
            // line 4
            echo "
    ";
            // line 5
            if (((isset($context["pagename"]) ? $context["pagename"] : $this->getContext($context, "pagename")) == $this->getAttribute($this->getAttribute((isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")), "getCurrentRoute", array(), "method"), "getName", array(), "method"))) {
                // line 6
                echo "        active
    ";
            }
            // line 8
            echo "
";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "macro/navigation.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 8,  43 => 6,  41 => 5,  38 => 4,  35 => 3,  33 => 2,  21 => 1,);
    }
}
