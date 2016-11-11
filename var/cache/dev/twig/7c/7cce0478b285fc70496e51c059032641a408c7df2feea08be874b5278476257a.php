<?php

/* SocialGamingBundle:Default:index.html.twig */
class __TwigTemplate_40e64493be447f6a18fbdf6319be0551bd164e8dc10de3f63b8245b93e1ca418 extends Twig_Template
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
        $__internal_1d18dc443fc45b6bcf252642e2dc94f9245e640399cb82211ec03441920d307f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1d18dc443fc45b6bcf252642e2dc94f9245e640399cb82211ec03441920d307f->enter($__internal_1d18dc443fc45b6bcf252642e2dc94f9245e640399cb82211ec03441920d307f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SocialGamingBundle:Default:index.html.twig"));

        // line 1
        echo "<html>
<head>
<title>SWR - Social Gaming Plattform</title>
</head>
<body>
    hallo welt!
</body>
</html>
";
        
        $__internal_1d18dc443fc45b6bcf252642e2dc94f9245e640399cb82211ec03441920d307f->leave($__internal_1d18dc443fc45b6bcf252642e2dc94f9245e640399cb82211ec03441920d307f_prof);

    }

    public function getTemplateName()
    {
        return "SocialGamingBundle:Default:index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>
<head>
<title>SWR - Social Gaming Plattform</title>
</head>
<body>
    hallo welt!
</body>
</html>
", "SocialGamingBundle:Default:index.html.twig", "/var/www/html/socialgaming/src/SocialGamingBundle/Resources/views/Default/index.html.twig");
    }
}
