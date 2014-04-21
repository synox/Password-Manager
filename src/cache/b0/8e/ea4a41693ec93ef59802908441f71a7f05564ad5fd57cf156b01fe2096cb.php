<?php

/* macro/navigation.html */
class __TwigTemplate_b08eea4a41693ec93ef59802908441f71a7f05564ad5fd57cf156b01fe2096cb extends Twig_Template
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
        return array (  47 => 8,  43 => 6,  41 => 5,  38 => 4,  35 => 3,  33 => 2,  21 => 1,  271 => 139,  268 => 138,  246 => 104,  243 => 103,  236 => 88,  233 => 87,  227 => 140,  225 => 138,  221 => 137,  217 => 136,  213 => 135,  199 => 123,  197 => 103,  194 => 102,  188 => 100,  185 => 99,  179 => 97,  177 => 96,  171 => 92,  169 => 87,  158 => 78,  151 => 74,  147 => 72,  144 => 71,  137 => 67,  126 => 59,  123 => 58,  121 => 57,  114 => 55,  108 => 54,  102 => 53,  96 => 52,  89 => 48,  76 => 37,  74 => 36,  56 => 21,  50 => 18,  40 => 11,  36 => 10,  32 => 9,  22 => 1,);
    }
}
