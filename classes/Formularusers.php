<?php
/**
 * Created by PhpStorm.
 * User: Doris
 * Date: 05/05/2018
 * Time: 16:18
 */

class Formularusers
{
    public $path;
    public $file;
    public function __construct($p, $f)
    {
        $this->path = $p;
        $this->file = $f;
    }
    public function frmGenerate($actionURI)
    {
        $conf = parse_ini_file($this->path . $this->file . ".ini", true);
        $form = "<form method='post' action='$actionURI'>";
        foreach($conf as $content) {

            $form .= "<div>";

            if (isset($content['name']) && $content['type'] != 'hidden' && $content['type'] != 'reset') {
                $form .= "<label for='" . $content['name'] . "'>";
                $form .= ucfirst($content['name']);
                $form .= "&nbsp;: ";
                $form .= "</label>";
            }



            $form .= "<";
            $form .= $content['tag'];
            $form .= " ";
            $form .= "type='";
            $form .= $content['type'];
            $form .= "' ";
            $form .= isset($content['name']) ? "name='" . $content['name'] . "'" : "";
            $form .= " />";
            $form .= "</div>";

        }
        $form .= "</form>";
        return $form;
    }
    public function frmCheck()

    {

        $conf = parse_ini_file($this->path . $this->file . ".ini", true);



        $hiddenFieldName = array_key_exists('itemHiddenField', $conf) ? $conf['itemHiddenField']['name'] : false;



        if (isset($_POST[$hiddenFieldName])) {

            $errors = array();

            foreach($conf as $content) {
                if (isset($content['name']) && $content['name'] != "hiddenField") {
                    $value = $content['name'];
                    $$value = $_POST[$value];
                    echo $$value . "<br />";

                    $$value = isset($_POST[$value])  ? $_POST[$value] : "" ;
                    if ($$value == "") array_push($errors, "Merci de saisir votre $value");
                }
            }

            if (count($errors) > 0) {
                $message = "<ul>";
                foreach ($errors as $msg) {
                    $message .= "<li>";
                    $message .= $msg;
                    $message .= "</li>";
                }

                $message .= "</ul>";
                echo $message;
            }

            else {



                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $mail = $_POST['mail'];
                $mdp = hash('sha256', $_POST['mdp']);
                $datenaissance = $_POST['date_de_naissance'];
                $genre = $_POST['genre'];
                $adresse = $_POST['adresse'];
                $codepostal = $_POST['code_postal'];
                $ville = $_POST['ville'];



                $sql = "INSERT INTO t_users (USENAME,USEFIRSTNAME,USEMAIL,USEPASSWORD,USEBIRTHDATE,USEGENDER,USEADRESS,USEPC,USECITY)
												VALUES('$nom','$prenom', '$mail','$mdp','$datenaissance', '$genre', '$adresse', '$codepostal', '$ville')";


                $requete = new Querie();
                $requete->insertMethod($sql);



            }



        }
        else {
            return false;
        }
    }



}









