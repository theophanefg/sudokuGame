<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_f322107c7de5fa42dd36b72321338a5256e0af016a88d67430776ddc4f389d86 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_63bc094594f6494b9a75ea61686d16b1f95192c62861dfb8593832be7568f0e2 = $this->env->getExtension("native_profiler");
        $__internal_63bc094594f6494b9a75ea61686d16b1f95192c62861dfb8593832be7568f0e2->enter($__internal_63bc094594f6494b9a75ea61686d16b1f95192c62861dfb8593832be7568f0e2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_63bc094594f6494b9a75ea61686d16b1f95192c62861dfb8593832be7568f0e2->leave($__internal_63bc094594f6494b9a75ea61686d16b1f95192c62861dfb8593832be7568f0e2_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_785555c79a18c7d3e51537c3f7a5ef10f8bc644548766e9ebae032330a144b2e = $this->env->getExtension("native_profiler");
        $__internal_785555c79a18c7d3e51537c3f7a5ef10f8bc644548766e9ebae032330a144b2e->enter($__internal_785555c79a18c7d3e51537c3f7a5ef10f8bc644548766e9ebae032330a144b2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_785555c79a18c7d3e51537c3f7a5ef10f8bc644548766e9ebae032330a144b2e->leave($__internal_785555c79a18c7d3e51537c3f7a5ef10f8bc644548766e9ebae032330a144b2e_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_ebccac8ab6b071b125aa8a96f38659bfae5f99d14abb86fe9539bfeb7edb414d = $this->env->getExtension("native_profiler");
        $__internal_ebccac8ab6b071b125aa8a96f38659bfae5f99d14abb86fe9539bfeb7edb414d->enter($__internal_ebccac8ab6b071b125aa8a96f38659bfae5f99d14abb86fe9539bfeb7edb414d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_ebccac8ab6b071b125aa8a96f38659bfae5f99d14abb86fe9539bfeb7edb414d->leave($__internal_ebccac8ab6b071b125aa8a96f38659bfae5f99d14abb86fe9539bfeb7edb414d_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_2c902590c1c5864dd0343cc4f8bfe477e122bdf655a945d6f9b20c5f608b2d5f = $this->env->getExtension("native_profiler");
        $__internal_2c902590c1c5864dd0343cc4f8bfe477e122bdf655a945d6f9b20c5f608b2d5f->enter($__internal_2c902590c1c5864dd0343cc4f8bfe477e122bdf655a945d6f9b20c5f608b2d5f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_2c902590c1c5864dd0343cc4f8bfe477e122bdf655a945d6f9b20c5f608b2d5f->leave($__internal_2c902590c1c5864dd0343cc4f8bfe477e122bdf655a945d6f9b20c5f608b2d5f_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
