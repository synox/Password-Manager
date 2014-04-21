<?php

/* base.html */
class __TwigTemplate_db1272c5ed351aad93dc43d1fffa4e24b2ecf216aae2bf1c5444284b4e782c1a extends Twig_Template
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
        echo "/lib/bootstrap3-editable/css/bootstrap-editable.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/pm.css\" rel=\"stylesheet\">

    

    <title>Password Manager</title>

    <!-- Bootstrap core CSS -->
    <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/lib/bootstrap-3.1/css/bootstrap.min.css\" rel=\"stylesheet\">

    <!-- Custom styles for this template -->
    <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/lib/bootstrap-jumbotron/jumbotron.css\" rel=\"stylesheet\">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src=\"../../assets/js/ie8-responsive-file-warning.js\"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
      <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->
  </head>

  <body>


";
        // line 36
        $context["nav"] = $this->env->loadTemplate("macro/navigation.html");
        // line 37
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
              <a class=\"navbar-brand glyphicon glyphicon-paperclip\" href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("home"), "html", null, true);
        echo "\"> Passwords</a>
          </div>
          <div class=\"navbar-collapse collapse\">
              <ul class=\"nav navbar-nav\">
                  <li class=\"";
        // line 52
        echo $context["nav"]->getisActivePage("home", (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")));
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("home"), "html", null, true);
        echo "\">Home</a></li>
                  <li class=\"";
        // line 53
        echo $context["nav"]->getisActivePage("account-list", (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")));
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("account-list"), "html", null, true);
        echo "\">List</a></li>
                  <li class=\"";
        // line 54
        echo $context["nav"]->getisActivePage("account-add", (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")));
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("account-add"), "html", null, true);
        echo "\">Add</a></li>
                  <li class=\"";
        // line 55
        echo $context["nav"]->getisActivePage("generate-password", (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")));
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("generate-password"), "html", null, true);
        echo "\">Generate Password</a></li>
              </ul>
              ";
        // line 57
        if (((isset($context["loggedin"]) ? $context["loggedin"] : $this->getContext($context, "loggedin")) == false)) {
            // line 58
            echo "              <ul class=\"nav navbar-nav navbar-right\">
                  <form class=\"navbar-form navbar-right\" role=\"form\" action=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("login-save"), "html", null, true);
            echo "\" method=\"post\">
                      <div class=\"form-group\">
                          <input type=\"text\" name=\"username\" placeholder=\"Username\" class=\"form-control\">
                      </div>
                      <div class=\"form-group\">
                          <input type=\"password\" name=\"password\" placeholder=\"Password\" class=\"form-control\">
                      </div>
                      <button type=\"submit\" class=\"btn btn-success\">Sign in</button>
                      <a href=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("register"), "html", null, true);
            echo "\" class=\"btn btn-info\" role=\"button\">Register</a>
                  </form>
              </ul>
              ";
        }
        // line 71
        echo "              ";
        if (((isset($context["loggedin"]) ? $context["loggedin"] : $this->getContext($context, "loggedin")) == true)) {
            // line 72
            echo "              <ul class=\"nav navbar-nav navbar-right\">
                  <form class=\"navbar-form navbar-right\" role=\"form\">
                      <a href=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("logout"), "html", null, true);
            echo "\" class=\"btn btn-default\" role=\"button\">Logout</a>
                  </form>
              </ul>
              ";
        }
        // line 78
        echo "          </div><!--/.nav-collapse -->
      </div>
  </div>

 

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class=\"jumbotron\">
      <div class=\"container\">
         ";
        // line 87
        $this->displayBlock('jumbotron', $context, $blocks);
        // line 92
        echo "      </div>
    </div>

    <div class=\"container\">
        ";
        // line 96
        if ($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "error", array(), "array", true, true)) {
            // line 97
            echo "        <p class=\"bg-success\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["flash"]) ? $context["flash"] : $this->getContext($context, "flash")), "error", array(), "array"), "html", null, true);
            echo "</p>
        ";
        }
        // line 99
        echo "        ";
        if ($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "message", array(), "array", true, true)) {
            // line 100
            echo "        <p class=\"bg-success\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["flash"]) ? $context["flash"] : $this->getContext($context, "flash")), "message", array(), "array"), "html", null, true);
            echo "</p>
        ";
        }
        // line 102
        echo "
    ";
        // line 103
        $this->displayBlock('content', $context, $blocks);
        // line 123
        echo "
      <hr>

      <footer>
        <p>Aravindo Wingeier, 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/lib/jquery/jquery-2.1.0.js\"></script>
    <script src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/lib/bootstrap-3.1/js/bootstrap.min.js\"></script>
    <script src=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->base(), "html", null, true);
        echo "/lib/bootstrap3-editable/js/bootstrap-editable.js\"></script>
    ";
        // line 138
        $this->displayBlock('extra_javascript', $context, $blocks);
        // line 140
        echo "  </body>
</html>
";
    }

    // line 87
    public function block_jumbotron($context, array $blocks = array())
    {
        // line 88
        echo "        <h1>Smart Password Manager</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class=\"btn btn-primary btn-lg\" role=\"button\">Learn more &raquo;</a></p>
        ";
    }

    // line 103
    public function block_content($context, array $blocks = array())
    {
        // line 104
        echo "      <!-- Example row of columns -->
      <div class=\"row\">
        <div class=\"col-md-4\">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class=\"btn btn-default\" href=\"#\" role=\"button\">View details &raquo;</a></p>
        </div>
        <div class=\"col-md-4\">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class=\"btn btn-default\" href=\"#\" role=\"button\">View details &raquo;</a></p>
       </div>
        <div class=\"col-md-4\">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class=\"btn btn-default\" href=\"#\" role=\"button\">View details &raquo;</a></p>
        </div>
      </div>
    ";
    }

    // line 138
    public function block_extra_javascript($context, array $blocks = array())
    {
        // line 139
        echo "    ";
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
        return array (  271 => 139,  268 => 138,  246 => 104,  243 => 103,  236 => 88,  233 => 87,  227 => 140,  225 => 138,  221 => 137,  217 => 136,  213 => 135,  199 => 123,  197 => 103,  194 => 102,  188 => 100,  185 => 99,  179 => 97,  177 => 96,  171 => 92,  169 => 87,  158 => 78,  151 => 74,  147 => 72,  144 => 71,  137 => 67,  126 => 59,  123 => 58,  121 => 57,  114 => 55,  108 => 54,  102 => 53,  96 => 52,  89 => 48,  76 => 37,  74 => 36,  56 => 21,  50 => 18,  40 => 11,  36 => 10,  32 => 9,  22 => 1,);
    }
}
