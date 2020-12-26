<?php

//définit la classe connection en appellation (à appeler partout)
//namespace = sorte de "dossier" qui permet de mettre des fonctions, constantes ou classes à l'intérieur sans générer de doublons
//avec celles qui s'appellent de la même manière à la racine
//permet d'éviter les conflits

//ici la classe connection est appelée App, on peut l'appeler partout
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

