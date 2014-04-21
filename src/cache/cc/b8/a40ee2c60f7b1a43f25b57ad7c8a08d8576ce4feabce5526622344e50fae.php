<?php

/* macro/navigation.html */
class __TwigTemplate_ccb8a40ee2c60f7b1a43f25b57ad7c8a08d8576ce4feabce5526622344e50fae extends Twig_Template
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
            // line 3
            ob_start();
            // line 4
            echo "
";
            // line 5
            if ((($this->getAttribute((isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")), "getCurrentRoute", array(), "method") != null) && ((isset($context["pagename"]) ? $context["pagename"] : $this->getContext($context, "pagename")) == $this->getAttribute($this->getAttribute((isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")), "getCurrentRoute", array(), "method"), "getName", array(), "method")))) {
                // line 6
                echo "active
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
        return array (  44 => 8,  38 => 5,  21 => 1,  260 => 129,  256 => 113,  253 => 112,  246 => 97,  243 => 96,  237 => 131,  235 => 129,  231 => 128,  223 => 126,  209 => 114,  207 => 112,  204 => 111,  198 => 109,  195 => 108,  187 => 105,  181 => 101,  179 => 96,  168 => 87,  161 => 83,  157 => 82,  152 => 80,  148 => 78,  145 => 77,  137 => 72,  121 => 61,  119 => 60,  111 => 57,  104 => 55,  97 => 53,  89 => 48,  74 => 36,  55 => 20,  49 => 17,  40 => 6,  36 => 10,  32 => 9,  22 => 1,  227 => 127,  224 => 124,  201 => 102,  192 => 99,  189 => 106,  185 => 97,  166 => 81,  162 => 80,  154 => 75,  147 => 71,  143 => 70,  135 => 65,  128 => 61,  124 => 62,  117 => 56,  110 => 52,  106 => 51,  99 => 47,  92 => 43,  88 => 42,  80 => 37,  76 => 37,  70 => 31,  63 => 18,  61 => 17,  56 => 15,  53 => 14,  51 => 13,  48 => 12,  45 => 11,  39 => 7,  35 => 4,  33 => 3,  30 => 3,);
    }
}
