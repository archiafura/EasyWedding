<?php
/**
 * Created by PhpStorm.
 * User: Doris
 * Date: 05/05/2018
 * Time: 16:14
 */

class Inscription
{

    public $data;

    public function __construct($data = array())
    {
        $this->data = $data;
    }

    public function input($name)
    {
        echo'<input type="text" name="'. $name .'" ></input>';
        return $name;
    }



    public function submit()
    {
        echo'<button type="submit">Envoyer</button>';
    }


}