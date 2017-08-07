<?php

/* index.html */
class __TwigTemplate_3ecf65cafc986d3b886dafa6d2008fc3fd7f03a015f0d838d28e81b539f4c80c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("template/layout.html", "index.html", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "template/layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "\t<title>Index Page</title>
\t<style>
\t\t/*div{
\t\t\twidth:100px;
\t\t\theight: 300px;
\t\t}*/
\t</style>\t
\t}
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "\t<p>test</p>
\t
\t<div>
\t<img src=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "ShowVerify/showVerify\" alt=\"验证码\" style=\"\" />
\t</div>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 19,  47 => 16,  44 => 15,  32 => 5,  29 => 4,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"template/layout.html\" %}


{% block head %}
\t<title>Index Page</title>
\t<style>
\t\t/*div{
\t\t\twidth:100px;
\t\t\theight: 300px;
\t\t}*/
\t</style>\t
\t}
{% endblock %}

{% block content %}
\t<p>test</p>
\t
\t<div>
\t<img src=\"{{ base_url }}ShowVerify/showVerify\" alt=\"验证码\" style=\"\" />
\t</div>
{% endblock %}", "index.html", "/home/syjs10/Geass/app/view/index.html");
    }
}
