<?php

/* macro/form.html */
class __TwigTemplate_6014b79a648d472331d961aaa68f12037c3460895ae75a2d2536fd04b3fe428c extends Twig_Template
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
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
            foreach ($context['_seq'] as $context["field"] => $context["field_error"]) {
                // line 3
                echo "        ";
                if (((isset($context["field"]) ? $context["field"] : $this->getContext($context, "field")) == (isset($context["fieldname"]) ? $context["fieldname"] : $this->getContext($context, "fieldname")))) {
                    // line 4
                    echo "            ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["field_error"]) ? $context["field_error"] : $this->getContext($context, "field_error")));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 5
                        echo "                <p class=\"bg-warning\">";
                        echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
                        echo "</p>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 7
                    echo "        ";
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
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form_errors"]) ? $context["form_errors"] : $this->getContext($context, "form_errors")));
            foreach ($context['_seq'] as $context["field"] => $context["field_error"]) {
                // line 15
                echo "        ";
                if (((isset($context["field"]) ? $context["field"] : $this->getContext($context, "field")) == (isset($context["fieldname"]) ? $context["fieldname"] : $this->getContext($context, "fieldname")))) {
                    // line 16
                    echo "            has-error
        ";
                }
                // line 18
                echo "    ";
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
        return array (  105 => 18,  101 => 16,  98 => 15,  93 => 14,  91 => 13,  60 => 7,  51 => 5,  43 => 3,  26 => 1,  22 => 20,  19 => 11,  208 => 110,  205 => 109,  183 => 88,  174 => 86,  170 => 85,  151 => 69,  147 => 68,  141 => 65,  134 => 61,  130 => 60,  124 => 57,  117 => 53,  113 => 52,  107 => 49,  100 => 45,  96 => 44,  90 => 41,  83 => 37,  79 => 12,  73 => 33,  69 => 31,  63 => 8,  57 => 15,  55 => 14,  49 => 11,  46 => 4,  44 => 9,  41 => 8,  38 => 2,  33 => 4,  30 => 3,);
    }
}
