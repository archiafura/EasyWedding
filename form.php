<?php
/**
 * Created by PhpStorm.
 * User: Doris
 * Date: 05/05/2018
 * Time: 16:10
 */


define("PATHCONF", "./conf/");
date_default_timezone_set("Europe/Paris");
require_once "./functions/classAutoLoader.php";
spl_autoload_register('classAutoLoader');
$test = new Formulaire(PATHCONF, "inscription");
$test->frmCheck();


