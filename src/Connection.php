<?php

//définit la classe connection en appellation (à appeler partout)
namespace App;

use PDO;

//met la connexion dans une classe et retourne une fonction publique
class  Connection
{

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return new PDO('mysql:dbname=utilisateur;host=127.0.0.1', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION


        ]);



        }




}

