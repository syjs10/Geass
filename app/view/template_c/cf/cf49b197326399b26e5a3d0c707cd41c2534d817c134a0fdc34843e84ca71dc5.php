<?php

/* template/layout.html */
class __TwigTemplate_db83f7b10926d73ed58bb65544d2881c6e58e49718785d13b19019397c6dad6d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
\t<meta charset=\"UTF-8\">
\t";
        // line 5
        $this->displayBlock('head', $context, $blocks);
        // line 7
        echo "</head>
<body>
\t
\t";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "\t
</body>
</html>";
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "\t";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "\t";
    }

    public function getTemplateName()
    {
        return "template/layout.html";
    }

    public function getDebugInfo()
    {
        return array (  52 => 11,  49 => 10,  45 => 6,  42 => 5,  36 => 12,  34 => 10,  29 => 7,  27 => 5,  21 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
\t<meta charset=\"UTF-8\">
\t{% block head %}
\t{% endblock %}
</head>
<body>
\t
\t{% block content %}
\t{% endblock %}
\t
</body>
</html>", "template/layout.html", "/home/syjs10/Geass/app/view/template/layout.html");
    }
}
