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

/* base.html.twig */
class __TwigTemplate_6ddc216faa59a07abe95bc8b7a0881f5557b0706db83acd786cf3af7f8d6ad1e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\"
          integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/front/css/all.css"), "html", null, true);
        echo "\">
    ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "</head>
<body>
<nav class=\"navbar navbar-expand-lg navbar-light\" style=\"background-color: #f1f8e9;\">
    <a class=\"navbar-brand\" href=\"";
        // line 14
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        echo "\">
        <img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/img/green_logo.png"), "html", null, true);
        echo "\" width=\"60\" height=\"60\"
             class=\"d-inline-block align-middle\"
             alt=\"logo\">Green and Care
    </a>
    <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNavDropdown\"
            aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>
    <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
        <ul class=\"navbar-nav\">
            <li class=\"nav-item ";
        // line 25
        if (((isset($context["current_menu"]) || array_key_exists("current_menu", $context)) && 0 === twig_compare((isset($context["current_menu"]) || array_key_exists("current_menu", $context) ? $context["current_menu"] : (function () { throw new RuntimeError('Variable "current_menu" does not exist.', 25, $this->source); })()), "home"))) {
            echo "active";
        }
        echo "\">
                <a class=\"nav-link\" href=\"";
        // line 26
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        echo "\">Accueil<span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Conseils</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Actualités</a>
            </li>


            <li class=\"nav-item dropdown ";
        // line 36
        if (((isset($context["current_menu"]) || array_key_exists("current_menu", $context)) && 0 === twig_compare((isset($context["current_menu"]) || array_key_exists("current_menu", $context) ? $context["current_menu"] : (function () { throw new RuntimeError('Variable "current_menu" does not exist.', 36, $this->source); })()), "products"))) {
            echo "active";
        }
        echo "\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\"
                   data-toggle=\"dropdown\"
                   aria-haspopup=\"true\" aria-expanded=\"false\">
                    Boutique
                </a>
                <div class=\"dropdown-menu\" style=\"background-color: #f1f8e9\"
                     aria-labelledby=\"navbarDropdownMenuLink\">
                    <a class=\"dropdown-item font-weight-bold text-uppercase\" style=\"color: #ffab40\"
                       href=\"";
        // line 45
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("product.index");
        echo "\">Tous nos produits</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item font-weight-bold text-uppercase\" style=\"color: #69f0ae\" href=\"#\">La
                        maison</a>
                    <a class=\"dropdown-item\" href=\"#\">Maison</a>
                    <a class=\"dropdown-item\" href=\"#\">Vaisselle</a>
                    <a class=\"dropdown-item\" href=\"#\">Microfibres</a>
                    <a class=\"dropdown-item\" href=\"#\">Linge</a>
                    <a class=\"dropdown-item\" href=\"#\">Atmosphère</a>
                    <a class=\"dropdown-item\" href=\"#\">Accessoires d'entretien</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item font-weight-bold text-uppercase\" style=\"color: #880e4f\" href=\"#\">La
                        cosmétique</a>
                    <a class=\"dropdown-item\" href=\"#\">Visage</a>
                    <a class=\"dropdown-item\" href=\"#\">Corps</a>
                    <a class=\"dropdown-item\" href=\"#\">Hygiène</a>
                    <a class=\"dropdown-item\" href=\"#\">Cheveux</a>
                    <a class=\"dropdown-item\" href=\"#\">Homme</a>
                    <a class=\"dropdown-item\" href=\"#\">Bébé</a>
                    <a class=\"dropdown-item\" href=\"#\">Enfant</a>
                    <a class=\"dropdown-item\" href=\"#\">Accessoires Cosmétiques</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item font-weight-bold text-uppercase\" style=\"color: #827717\" href=\"#\">Le
                        bien-être</a>
                    <a class=\"dropdown-item\" href=\"#\">Huiles essentielles</a>
                    <a class=\"dropdown-item\" href=\"#\">Compléments alimentaires</a>
                    <a class=\"dropdown-item\" href=\"#\">Tisanes</a>
                </div>
            </li>


            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\"><i class=\"fas fa-search\"></i></a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\"><i class=\"fas fa-shopping-basket\"></i></a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\"><i class=\"fas fa-user\"></i></a>
            </li>
        </ul>
    </div>

    ";
        // line 88
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "user", [], "any", false, false, false, 88)) {
            // line 89
            echo "        <a href=\"#\">Déconnexion</a>
    ";
        } else {
            // line 91
            echo "        <a href=\"#\">Connexion</a>
        <a href=\"#\">Inscription</a>

    ";
        }
        // line 95
        echo "</nav>

";
        // line 97
        $this->displayBlock('body', $context, $blocks);
        // line 98
        $this->displayBlock('javascripts', $context, $blocks);
        // line 99
        echo "<script src=\"https://code.jquery.com/jquery-3.4.1.slim.min.js\"
        integrity=\"sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n\"
        crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\"
        integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\"
        crossorigin=\"anonymous\"></script>
<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js\"
        integrity=\"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6\"
        crossorigin=\"anonymous\"></script>
</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Green and Care";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 10
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 97
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 98
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  263 => 98,  245 => 97,  227 => 10,  208 => 6,  187 => 99,  185 => 98,  183 => 97,  179 => 95,  173 => 91,  169 => 89,  167 => 88,  121 => 45,  107 => 36,  94 => 26,  88 => 25,  75 => 15,  71 => 14,  66 => 11,  64 => 10,  60 => 9,  54 => 6,  47 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <title>{% block title %}Green and Care{% endblock %}</title>
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\"
          integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/front/css/all.css') }}\">
    {% block stylesheets %}{% endblock %}
</head>
<body>
<nav class=\"navbar navbar-expand-lg navbar-light\" style=\"background-color: #f1f8e9;\">
    <a class=\"navbar-brand\" href=\"{{ path('home') }}\">
        <img src=\"{{ asset('assets/img/green_logo.png') }}\" width=\"60\" height=\"60\"
             class=\"d-inline-block align-middle\"
             alt=\"logo\">Green and Care
    </a>
    <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNavDropdown\"
            aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>
    <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
        <ul class=\"navbar-nav\">
            <li class=\"nav-item {% if current_menu is defined and current_menu == 'home' %}active{% endif %}\">
                <a class=\"nav-link\" href=\"{{ path('home') }}\">Accueil<span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Conseils</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Actualités</a>
            </li>


            <li class=\"nav-item dropdown {% if current_menu is defined and current_menu == 'products' %}active{% endif %}\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\"
                   data-toggle=\"dropdown\"
                   aria-haspopup=\"true\" aria-expanded=\"false\">
                    Boutique
                </a>
                <div class=\"dropdown-menu\" style=\"background-color: #f1f8e9\"
                     aria-labelledby=\"navbarDropdownMenuLink\">
                    <a class=\"dropdown-item font-weight-bold text-uppercase\" style=\"color: #ffab40\"
                       href=\"{{ path('product.index') }}\">Tous nos produits</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item font-weight-bold text-uppercase\" style=\"color: #69f0ae\" href=\"#\">La
                        maison</a>
                    <a class=\"dropdown-item\" href=\"#\">Maison</a>
                    <a class=\"dropdown-item\" href=\"#\">Vaisselle</a>
                    <a class=\"dropdown-item\" href=\"#\">Microfibres</a>
                    <a class=\"dropdown-item\" href=\"#\">Linge</a>
                    <a class=\"dropdown-item\" href=\"#\">Atmosphère</a>
                    <a class=\"dropdown-item\" href=\"#\">Accessoires d'entretien</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item font-weight-bold text-uppercase\" style=\"color: #880e4f\" href=\"#\">La
                        cosmétique</a>
                    <a class=\"dropdown-item\" href=\"#\">Visage</a>
                    <a class=\"dropdown-item\" href=\"#\">Corps</a>
                    <a class=\"dropdown-item\" href=\"#\">Hygiène</a>
                    <a class=\"dropdown-item\" href=\"#\">Cheveux</a>
                    <a class=\"dropdown-item\" href=\"#\">Homme</a>
                    <a class=\"dropdown-item\" href=\"#\">Bébé</a>
                    <a class=\"dropdown-item\" href=\"#\">Enfant</a>
                    <a class=\"dropdown-item\" href=\"#\">Accessoires Cosmétiques</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item font-weight-bold text-uppercase\" style=\"color: #827717\" href=\"#\">Le
                        bien-être</a>
                    <a class=\"dropdown-item\" href=\"#\">Huiles essentielles</a>
                    <a class=\"dropdown-item\" href=\"#\">Compléments alimentaires</a>
                    <a class=\"dropdown-item\" href=\"#\">Tisanes</a>
                </div>
            </li>


            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\"><i class=\"fas fa-search\"></i></a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\"><i class=\"fas fa-shopping-basket\"></i></a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\"><i class=\"fas fa-user\"></i></a>
            </li>
        </ul>
    </div>

    {% if app.user %}
        <a href=\"#\">Déconnexion</a>
    {% else %}
        <a href=\"#\">Connexion</a>
        <a href=\"#\">Inscription</a>

    {% endif %}
</nav>

{% block body %}{% endblock %}
{% block javascripts %}{% endblock %}
<script src=\"https://code.jquery.com/jquery-3.4.1.slim.min.js\"
        integrity=\"sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n\"
        crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\"
        integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\"
        crossorigin=\"anonymous\"></script>
<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js\"
        integrity=\"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6\"
        crossorigin=\"anonymous\"></script>
</body>
</html>
", "base.html.twig", "C:\\Users\\Camille Toulisse\\Documents\\GitHub\\CDA-19224-2\\ProjetFilRouge\\templates\\base.html.twig");
    }
}
