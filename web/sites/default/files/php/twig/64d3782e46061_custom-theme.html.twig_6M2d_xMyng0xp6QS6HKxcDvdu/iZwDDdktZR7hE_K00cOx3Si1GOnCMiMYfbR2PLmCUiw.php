<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/ecommerce/templates/custom-theme.html.twig */
class __TwigTemplate_67e25495e7981a0bb92cc576cb728d04 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<ul>
\t";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 3
            echo "\t\t<li>
\t\t\t<strong>";
            // line 4
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, true, 4), 4, $this->source), "html", null, true);
            echo "</strong>
\t\t</li>
\t\t<li>
\t\t\tPrice :₹
\t\t\t";
            // line 8
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "
\t\t</li>
\t\t<img src=\"";
            // line 10
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
            echo "\" alt=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
            echo "\"/>
\t\t<li>
\t\t\t";
            // line 12
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
            echo "
\t\t</li>
\t\t<li>
\t\t\tAbout:
\t\t\t";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["product"], "category", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
            echo "
\t\t</li>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/ecommerce/templates/custom-theme.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 19,  75 => 16,  68 => 12,  61 => 10,  56 => 8,  49 => 4,  46 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<ul>
\t{% for product in products %}
\t\t<li>
\t\t\t<strong>{{ product.title }}</strong>
\t\t</li>
\t\t<li>
\t\t\tPrice :₹
\t\t\t{{ product.price }}
\t\t</li>
\t\t<img src=\"{{ product.image }}\" alt=\"{{ product.title }}\"/>
\t\t<li>
\t\t\t{{ product.description }}
\t\t</li>
\t\t<li>
\t\t\tAbout:
\t\t\t{{ product.category }}
\t\t</li>
\t{% endfor %}
</ul>
", "modules/custom/ecommerce/templates/custom-theme.html.twig", "/var/www/test.com/ecommerce/web/modules/custom/ecommerce/templates/custom-theme.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 2);
        static $filters = array("escape" => 4);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
