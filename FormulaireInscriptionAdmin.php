<?php
/**
 * Created by PhpStorm.
 * User: Doris
 * Date: 05/05/2018
 * Time: 18:43
 */

require_once "./functions/classAutoLoader.php";
spl_autoload_register('classAutoLoader');

define("PATHCONF", "./conf/");




$test = new Formulaire(PATHCONF, "inscriptionAdmin");

echo $test->frmGenerate("form.php");