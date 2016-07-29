<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_64d726f9c9cac233f348af9d5dda276497b8651cb58e72d0920d3d73cbef4b78 extends Twig_Template
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
        $__internal_f6132f2a13d46878bf6a775edbe225de12436b2365ef844c30fa9816af647798 = $this->env->getExtension("native_profiler");
        $__internal_f6132f2a13d46878bf6a775edbe225de12436b2365ef844c30fa9816af647798->enter($__internal_f6132f2a13d46878bf6a775edbe225de12436b2365ef844c30fa9816af647798_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f6132f2a13d46878bf6a775edbe225de12436b2365ef844c30fa9816af647798->leave($__internal_f6132f2a13d46878bf6a775edbe225de12436b2365ef844c30fa9816af647798_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_f4fab94366181e1fe43085e38082f02d20dfa3b652519a213fe067fc5e4cbf0f = $this->env->getExtension("native_profiler");
        $__internal_f4fab94366181e1fe43085e38082f02d20dfa3b652519a213fe067fc5e4cbf0f->enter($__internal_f4fab94366181e1fe43085e38082f02d20dfa3b652519a213fe067fc5e4cbf0f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_f4fab94366181e1fe43085e38082f02d20dfa3b652519a213fe067fc5e4cbf0f->leave($__internal_f4fab94366181e1fe43085e38082f02d20dfa3b652519a213fe067fc5e4cbf0f_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_025d907f61f8388bb1fe35d6a6a8c11ece8306a983c5fb4b33d3e9559696b9d8 = $this->env->getExtension("native_profiler");
        $__internal_025d907f61f8388bb1fe35d6a6a8c11ece8306a983c5fb4b33d3e9559696b9d8->enter($__internal_025d907f61f8388bb1fe35d6a6a8c11ece8306a983c5fb4b33d3e9559696b9d8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_025d907f61f8388bb1fe35d6a6a8c11ece8306a983c5fb4b33d3e9559696b9d8->leave($__internal_025d907f61f8388bb1fe35d6a6a8c11ece8306a983c5fb4b33d3e9559696b9d8_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_541b71372a5fd2df4e04f9612e70dfa8fbd67461ce661dd8429e693749f64562 = $this->env->getExtension("native_profiler");
        $__internal_541b71372a5fd2df4e04f9612e70dfa8fbd67461ce661dd8429e693749f64562->enter($__internal_541b71372a5fd2df4e04f9612e70dfa8fbd67461ce661dd8429e693749f64562_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_541b71372a5fd2df4e04f9612e70dfa8fbd67461ce661dd8429e693749f64562->leave($__internal_541b71372a5fd2df4e04f9612e70dfa8fbd67461ce661dd8429e693749f64562_prof);

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
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
