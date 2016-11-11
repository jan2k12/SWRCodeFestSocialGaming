<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_35f39f9cc12b449c83c6dda9a46da9cf4a177f9b32c1c5231e487312bb53c3cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c6ca1df491d19e13a3141912dc4c2d025ee1a6c42cb84aadc7b71e8352206d48 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c6ca1df491d19e13a3141912dc4c2d025ee1a6c42cb84aadc7b71e8352206d48->enter($__internal_c6ca1df491d19e13a3141912dc4c2d025ee1a6c42cb84aadc7b71e8352206d48_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c6ca1df491d19e13a3141912dc4c2d025ee1a6c42cb84aadc7b71e8352206d48->leave($__internal_c6ca1df491d19e13a3141912dc4c2d025ee1a6c42cb84aadc7b71e8352206d48_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_c56ebff35499fba14683bbe710066c2f24102e893b15228c131d018ae27beaeb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c56ebff35499fba14683bbe710066c2f24102e893b15228c131d018ae27beaeb->enter($__internal_c56ebff35499fba14683bbe710066c2f24102e893b15228c131d018ae27beaeb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "@WebProfiler/Collector/router.html.twig"));

        
        $__internal_c56ebff35499fba14683bbe710066c2f24102e893b15228c131d018ae27beaeb->leave($__internal_c56ebff35499fba14683bbe710066c2f24102e893b15228c131d018ae27beaeb_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_27dae2ffe94d95f998d5a4f63f0321713a1160e7534ed4f4fc2b759b67a8f85e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_27dae2ffe94d95f998d5a4f63f0321713a1160e7534ed4f4fc2b759b67a8f85e->enter($__internal_27dae2ffe94d95f998d5a4f63f0321713a1160e7534ed4f4fc2b759b67a8f85e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "@WebProfiler/Collector/router.html.twig"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_27dae2ffe94d95f998d5a4f63f0321713a1160e7534ed4f4fc2b759b67a8f85e->leave($__internal_27dae2ffe94d95f998d5a4f63f0321713a1160e7534ed4f4fc2b759b67a8f85e_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_a65a41e1eb47a4629327f8688b4cb874f0adb1b32a0a017a65385b8e704be428 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a65a41e1eb47a4629327f8688b4cb874f0adb1b32a0a017a65385b8e704be428->enter($__internal_a65a41e1eb47a4629327f8688b4cb874f0adb1b32a0a017a65385b8e704be428_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "@WebProfiler/Collector/router.html.twig"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_a65a41e1eb47a4629327f8688b4cb874f0adb1b32a0a017a65385b8e704be428->leave($__internal_a65a41e1eb47a4629327f8688b4cb874f0adb1b32a0a017a65385b8e704be428_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/var/www/html/socialgaming/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
