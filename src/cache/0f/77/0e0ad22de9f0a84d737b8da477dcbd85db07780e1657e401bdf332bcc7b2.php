<?php

/* base.html */
class __TwigTemplate_0f770e0ad22de9f0a84d737b8da477dcbd85db07780e1657e401bdf332bcc7b2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'jumbotron' => array($this, 'block_jumbotron'),
            'content' => array($this, 'block_content'),
            'extra_javascript' => array($this, 'block_extra_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"shortcut icon\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/favicon.ico\">
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/pm.css\" rel=\"stylesheet\">


    <title>Password Manager</title>

    <!-- Bootstrap core CSS -->
    <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/lib/bootstrap-3.1/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/lib/font-awesome-4.0.3/css/font-awesome.min.css\">


    <!-- Custom styles for this template -->
    <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/lib/bootstrap-jumbotron/jumbotron.css\" rel=\"stylesheet\">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src=\"../../assets/js/ie8-responsive-file-warning.js\"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
    <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>

<body>


";
        // line 37
        $context["nav"] = $this->env->loadTemplate("macro/navigation.html");
        // line 38
        echo "
<!-- Fixed navbar -->
<div class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Home:index"), "html", null, true);
        echo "\">
                <i class=\"fa fa-lock\"></i> Passwords</a>
        </div>
        <div class=\"navbar-collapse collapse\">
            <ul class=\"nav navbar-nav\">
                <li class=\"";
        // line 54
        echo $context["nav"]->getisActivePage("Pwgen:gen", (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")));
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Pwgen:gen"), "html", null, true);
        echo "\">
                    <i class=\"fa fa-key\"></i> PW Gen.</a></li>
                <li class=\"";
        // line 56
        echo $context["nav"]->getisActivePage("Account:index", (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")));
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Account:index"), "html", null, true);
        echo "\">
                    <i class=\"fa fa-list\"></i> List</a></li>
                <li class=\"";
        // line 58
        echo $context["nav"]->getisActivePage("Account:add", (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")));
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("Account:add"), "html", null, true);
        echo "\">
                    <i class=\"fa fa-plus-circle\"></i> Add</a></li>
            </ul>
            ";
        // line 61
        if (((isset($context["loggedin"]) ? $context["loggedin"] : $this->getContext($context, "loggedin")) == false)) {
            // line 62
            echo "            <ul class=\"nav navbar-nav navbar-right\">
                <form class=\"navbar-form navbar-right\" role=\"form\" action=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("User:login"), "html", null, true);
            echo "\" method=\"post\">
                    <div class=\"form-group\">
                        <input type=\"text\" name=\"username\" placeholder=\"Username\" class=\"form-control input-sm\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"password\" name=\"password\" placeholder=\"Password\" class=\"form-control input-sm\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-success\"><span class=\"glyphicon glyphicon-log-in\"></span> Sign
                        in
                    </button>
                    <a href=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("User:register"), "html", null, true);
            echo "\" class=\"btn btn-info\" role=\"button\"><span
                            class=\"glyphicon glyphicon-pencil\"></span> Register</a>
                </form>
            </ul>
            ";
        }
        // line 78
        echo "            ";
        if (((isset($context["loggedin"]) ? $context["loggedin"] : $this->getContext($context, "loggedin")) == true)) {
            // line 79
            echo "            <ul class=\"nav navbar-nav navbar-right\">
                <div class=\"navbar-form\">
                    <a href=\"";
            // line 81
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("User:settings"), "html", null, true);
            echo "\" class=\"btn btn-default\" role=\"button\">
                        <i class=\"fa fa-cogs\"></i> Settings</a>
                    <a href=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("User:logout"), "html", null, true);
            echo "\" class=\"btn btn-default\" role=\"button\">
                        <i class=\"fa fa-power-off\"></i> Logout</a>
                </div>
            </ul>
            <p class=\"navbar-text navbar-right\">Signed in as ";
            // line 87
            echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "html", null, true);
            echo " </p>

            ";
        }
        // line 90
        echo "        </div>
        <!--/.nav-collapse -->
    </div>
</div>


<!-- Main jumbotron for a primary marketing message or call to action -->
<div class=\"jumbotron\">
    <div class=\"container\">
        ";
        // line 99
        $this->displayBlock('jumbotron', $context, $blocks);
        // line 101
        echo "    </div>
</div>

<div class=\"container\">
    ";
        // line 105
        if ($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "error", array(), "array", true, true)) {
            // line 106
            echo "    <p class=\"bg-success\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["flash"]) ? $context["flash"] : $this->getContext($context, "flash")), "error", array(), "array"), "html", null, true);
            echo "</p>
    ";
        }
        // line 108
        echo "    ";
        if ($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "message", array(), "array", true, true)) {
            // line 109
            echo "    <p class=\"bg-success\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["flash"]) ? $context["flash"] : $this->getContext($context, "flash")), "message", array(), "array"), "html", null, true);
            echo "</p>
    ";
        }
        // line 111
        echo "
    ";
        // line 112
        $this->displayBlock('content', $context, $blocks);
        // line 114
        echo "
    <hr>
    <footer>
        <p>Aravindo Wingeier, 2014</p>
    </footer>
</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src=\"";
        // line 126
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/lib/jquery/jquery-2.1.0.js\"></script>
<script src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/lib/bootstrap-3.1/js/bootstrap.min.js\"></script>
";
        // line 128
        $this->displayBlock('extra_javascript', $context, $blocks);
        // line 130
        echo "</body>
</html>
";
    }

    // line 99
    public function block_jumbotron($context, array $blocks = array())
    {
        // line 100
        echo "        ";
    }

    // line 112
    public function block_content($context, array $blocks = array())
    {
        // line 113
        echo "    ";
    }

    // line 128
    public function block_extra_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  256 => 128,  252 => 113,  249 => 112,  245 => 100,  242 => 99,  236 => 130,  234 => 128,  230 => 127,  226 => 126,  212 => 114,  210 => 112,  207 => 111,  201 => 109,  198 => 108,  192 => 106,  190 => 105,  184 => 101,  182 => 99,  171 => 90,  165 => 87,  158 => 83,  153 => 81,  149 => 79,  146 => 78,  138 => 73,  125 => 63,  122 => 62,  120 => 61,  112 => 58,  105 => 56,  98 => 54,  90 => 49,  77 => 38,  75 => 37,  56 => 21,  49 => 17,  45 => 16,  36 => 10,  22 => 1,  65 => 29,  50 => 17,  42 => 11,  39 => 10,  32 => 9,  29 => 3,);
    }
}
