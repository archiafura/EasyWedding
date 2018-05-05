<?php
/**
 * Created by PhpStorm.
 * User: Doris
 * Date: 05/05/2018
 * Time: 18:33
 */

require_once "./functions/classAutoLoader.php";
spl_autoload_register('classAutoLoader');

define("PATHCONF", "./conf/");



$test = new Formulaire(PATHCONF, "inscription");


echo $test->frmGenerate("form.php");
