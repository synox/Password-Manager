<?php

/* macro/form.html */
class __TwigTemplate_e55564533f9c269014fd7f7624194c8e435dc86e5e01d7c7f1277364f2917442 extends Twig_Template
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
        // line 11
        echo "
";
        // line 20
        echo "”";
    }

    // line 1
    public function getprint_error($_fieldname = null, $_form_errors = null)
    {
        $context = $this->env->mergeGlobals(array(
            "fieldname" => $_fieldname,
            "form_errors" => $_form_errors,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
            foreach ($context['_seq'] as $context["field"] => $context["field_error"]) {
                // line 3
                if (((isset($context["field"]) ? $context["field"] : $this->getContext($context, "field")) == (isset($context["fieldname"]) ? $context["fieldname"] : $this->getContext($context, "fieldname")))) {
                    // line 4
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["field_error"]) ? $context["field_error"] : $this->getContext($context, "field_error")));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 5
                        echo "<p class=\"bg-warning\">";
                        echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
                        echo "</p>
";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                // line 8
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['field'], $context['field_error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 12
    public function getprint_error_class($_fieldname = null, $_form_errors = null)
    {
        $context = $this->env->mergeGlobals(array(
            "fieldname" => $_fieldname,
            "form_errors" => $_form_errors,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 13
            ob_start();
            // line 14
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
            foreach ($context['_seq'] as $context["field"] => $context["field_error"]) {
                // line 15
                if (((isset($context["field"]) ? $context["field"] : $this->getContext($context, "field")) == (isset($context["fieldname"]) ? $context["fieldname"] : $this->getContext($context, "fieldname")))) {
                    // line 16
                    echo "has-error
";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['field'], $context['field_error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "macro/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 16,  86 => 13,  58 => 8,  42 => 3,  26 => 1,  19 => 11,  44 => 4,  38 => 2,  21 => 1,  260 => 129,  256 => 113,  253 => 112,  246 => 97,  243 => 96,  237 => 131,  235 => 129,  231 => 128,  223 => 126,  209 => 114,  207 => 112,  204 => 111,  198 => 109,  195 => 108,  187 => 105,  181 => 101,  179 => 96,  168 => 87,  161 => 83,  157 => 82,  152 => 80,  148 => 78,  145 => 77,  137 => 72,  121 => 61,  119 => 60,  111 => 57,  104 => 55,  97 => 53,  89 => 48,  74 => 12,  55 => 20,  49 => 17,  40 => 6,  36 => 10,  32 => 9,  22 => 20,  227 => 127,  224 => 124,  201 => 102,  192 => 99,  189 => 106,  185 => 97,  166 => 81,  162 => 80,  154 => 75,  147 => 71,  143 => 70,  135 => 65,  128 => 61,  124 => 62,  117 => 56,  110 => 52,  106 => 51,  99 => 47,  92 => 15,  88 => 14,  80 => 37,  76 => 37,  70 => 31,  63 => 18,  61 => 17,  56 => 15,  53 => 14,  51 => 13,  48 => 5,  45 => 11,  39 => 7,  35 => 4,  33 => 3,  30 => 3,);
    }
}
