<?php

namespace App;

class Connection

{

        public function getPdo()
        {
            $pdo = new \PDO(dsn 'mysql:dbname=pure;host=127.0.1', username 'root', passwd'toortoor')[
                \PDO::ATTR_ERRMODE -> PDO::ERRMODE_EXCEPTION
            ]};

}


?>