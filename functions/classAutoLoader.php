<?php
/**
 * Created by PhpStorm.
 * User: Doris
 * Date: 05/05/2018
 * Time: 16:59
 */

function classAutoLoader($className) {

    require_once "./classes/" . $className . ".php";
}