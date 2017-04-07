<?php

//header('Content-type: text/html; charset=UTF-8');
//header('Pragma: No-cache');
/* ==========================================================
 * Ace Admin v1.2
 * index.php
 *
 * http://www.itdast.com
 * Copyright ITDAST
 *
 * Designed and built exclusively for ITDAST
 * ========================================================== */

/*
 * Config
 */

// relative path to theme common resources (styles/iamges/etc)
// used for generating the final download package
// $_ROOT = "../../../../common/";
$_ROOT = "common/";

// development / production
defined('DEV') || define('DEV', false);

// used to determine what resources to use in final package
defined('DEMO') || define('DEMO', false);

// toggle google analytics code in head section
defined('GA') || define('GA', false);

// default level / used for getURL paths (should't be modified)
defined('LEVEL') || define('LEVEL', 0);

// allow menu customization from the browser
defined('MENU_JS') || define('MENU_JS', isset($_GET['menu_position']) ? false : true);

// allow layout customization from the browser
defined('LAYOUT_JS') || define('LAYOUT_JS', isset($_GET['layout_type']) ? false : true);

// allow skin customization from the browser
defined('SKIN_JS') || define('SKIN_JS', true);

// show dark/light style toggle button
defined('STYLE_TOGGLE') || define('STYLE_TOGGLE', !DEMO ? false : true);

// 'menu-right' / 'menu-left' or 'menu-hidden'
defined('MENU_POSITION') || define('MENU_POSITION', isset($_GET['menu_position']) ? $_GET['menu_position'] : 'menu-left');

// 'fixed' or 'fluid'
defined('LAYOUT_TYPE') || define('LAYOUT_TYPE', isset($_GET['layout_type']) ? $_GET['layout_type'] : 'fluid');

// MAIN stylesheet
defined('STYLE') || define('STYLE', isset($_GET['style']) ? $_GET['style'] : 'style-light');

// filename without extension (eg. "brown") or false for default
defined('SKIN_CUSTOM') || define('SKIN_CUSTOM', false);

// edit SKIN_CUSTOM above
defined('SKIN') || define('SKIN', SKIN_JS ? false : SKIN_CUSTOM);

// enable or disable the Guided Tour
defined('GUIDED_TOUR') || define('GUIDED_TOUR', false);

// enable or disable the Resizable sidebars functionality
defined('MENU_RESIZABLE') || define('MENU_RESIZABLE', true);

/*
 * Current / default page
 */

$page = isset($_GET['page']) ? $_GET['page'] : 'index';
/*
 * Other variables
 * Used mainly for documentation
 */

$section = isset($_GET['section']) ? $_GET['section'] : 'index';
$sub_section = isset($_GET['ss']) ? $_GET['ss'] : 'index';
$_LEVEL = LEVEL; // used for getURL function paths

/**
 * Incluyo mi archivo de configuracion del sistema
 */
define("PATH", "api/");
//Display de errores
ini_set("display_errors", true);
include_once("api/config.php");
$error_login = "";
if (isset($_POST["usuario"]) && isset($_POST["clave"])) {
    $usuario = Usuario::loguear($_POST["usuario"], ($_POST["clave"]));
    if ($usuario->getUsuario_id() != "") {
        Security::setSession("usuario_id", $usuario->getUsuario_id());
       Security::setSession("usuario_usuario", $usuario->getUsuario_usuario());        
        if (isset($_POST["relogin"])) {
             exit("OK");
        }else{

            header("Location: dialaboral.html");
            if (isset($_GET["continue"])) {
                
            } else {
                header("Location: dialaboral.html");
            }
        }
    }else {
        $error_login = true;
    }
}

/*
 * Zend_Translate
 */
define('APP_PATH', realpath(dirname(__FILE__)));

/*require_once 'Zend/Translate.php';

$locale = isset($_GET['lang']) ? $_GET['lang'] : 'en'; // default language
$translate = new Zend_Translate(array('adapter' => 'csv', 'content' => APP_LANG2, 'scan' => Zend_Translate::LOCALE_DIRECTORY));
$translate->setLocale($locale);*/

/*
 * Functions
 */
//echo $secure;

require_once 'functions.php';
/*
 * Colors
 */

//$primaryColor = "#e25f39"; // orange
$primaryColor = "#e04545"; // red

$primaryColor = "#e25f39";
$dangerColor = "#bd362f";
$successColor = "#609450";
$warningColor = "#ab7a4b";
$inverseColor = "#45484d";





/**
 * MULTILENGUAJE PHP
 */
//header('Cache-control: private'); // IE 6 FIX




/**
 * FIN DE MULTILENGUAJE
 */
/*
 * Pages
 */
$security = new Security(false);

if (!$security->isLogged()) {
    $page = "login";
    $logged=false;
}
else{
    $logged=true;
}

$tipo="2";

switch ($page) {        
    case 'asistencia':
    break;
    case 'dialaboral':
    break;
    case 'horaextras':
    break;
    case 'cargo':
    break;
    case 'horario':
    break;
    case 'reportes':
    break;
    case 'inasistencias':
        break;
    case 'usuario':
    break;
    case 'trabajador':
    break;
    case 'index':
    break;
    case 'enviocorreo':
        break;
    case 'index':
    break;
    case "login":
    break;
    case "logout":
    break;
    default :
    $page = "error-404";
    break;
}

/* // header
require_once 'pages/header.php'; */
// content
if (file_exists('pages/' . $page . '.php'))
    require_once 'pages/' . $page . '.php';
//require_once 'pages/' . "blank" . '.php';

/*
 * Footer
 */
/* require_once 'pages/footer.php'; */
?>