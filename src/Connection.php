<?php

namespace App;

use PDO;


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

