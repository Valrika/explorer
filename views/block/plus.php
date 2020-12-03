<?php

if (isset($message)) {
    echo '<label class="alert alert-danger">' . $message . '</label>';
}
?
array(
try {
$pdo = (new Connection())->getPdo();

if (isset($_POST["submit"]))
{
if(empty($_POST["username"]) || empty($_POST["pwd"]))
{
$message = '<label>Tous les champs sont requis</label>';
}
else
{

$sth = $pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
$sth->bindParam(':username', $username);
$sth->execute();
$result = $sth->fetchAll(

'usename'  => $_POST["username"],
'password' => $_POST["pwd"],
)
);
$count = $sth->rowCount();
if ($count > 0)
{
$_SESSION["username"] = $_POST["username"];
header('location: /login');
}
else
{
$message = '<label>Identifiant ou nom d utilisateur incorrect</label>';
}

}

catch(PDOException:: $error);
{
$message = $php_errormsg;
}

}

//LOGIN

/*$erreur = null;
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
    if ($_POST['username'] === 'Val' && $_POST['pwd'] === 'Vali') {
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /c-login');
        exit();
    }else {
$erreur ="identifiantd incorrects";
    }

}
require '../src/auth.php';
if (est_connecte()) {
    header('Location: /c-login');
    exit();
}*/

?>
<?php

/*use App\Connection;
$erreur = null;
$pdo = (new Connection())->getPdo();

$title = "mon site";
$content = "content du site";
ob_start();

require_once '../controllers/c-login.php' ;

?>





<section class="signup-form">
    <h3 class="text-center">Connection</h3>
    <div class="signup-form-form">

        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="nom d'utilisateur" ">
            </div>
            <!-- Dans type on écrit password pour que l'utilisateur puisse le taper en toute discrétion -->
            <div class="form-group">
                <input type="password" name="pwd" placeholder="Password" ">
            </div>
            <button type="submit" name="submit">Connexion</button>
        </form>
    </div>


C-LOGIN


</section>
<?php
$content = ob_get_clean();

require("template.php");*/


//initialisation de la variable $errors pour qu'elle soit dispo globalement
$errors = array();
$username = "";
$pwd = "";
//require_once '../views/template.php';



$sth = $pdo->prepare('SELECT * FROM user WHERE username = :username');
$sth->bindParam(':username', $username);
$sth->execute();
$result = $sth->fetchAll();

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"]; {

    }

    }

        //if (isset($_POST['username']) && !empty($_POST['password'])) {

           /* function validate($data){
                $data=trim($data);
                $data=stripcslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }

            $username= ($_POST['username']);
            $pwd= ($_POST['pwd']);

            if (empty($username)){
                //header('location: /c-login');
                exit();
            }elseif (empty($pwd)) {
                //header('location: /c-login');
                exit();
            } else{
                echo "validation";

            }

        }else{
            //header('location: /c-login');
            exit();



}*/



// Si le user click sur le button submit

    /*if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
        header('/c-login');

        $sth = $pdo->prepare('SELECT * FROM user WHERE username = :username');
        $sth->bindParam(':username', $username);
        $sth->execute();
        $result = $sth->fetchAll();

    //Validation on s'assure que le user utilise les valeurs requise pour la validation
        if (isset($_POST) && !empty($_POST)) {

            if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
                $password = $_POST['password'];

                session_start();
                if (!$username) {
                    $_SESSION['erreur'] =  'Nom et/ou mot de passe invalide';
                } else {
                    if (password_verify($pwd, $username['pdw'])) {
                        $_SESSION['username'] = $pwd['pwd'];

                        header('/c-login');
                    } else {
                        $_SESSION['erreur'] = 'Nom et/ou mot de passe invalide';
                    }
                }
            } else {
                $_SESSION['erreur'] = "Veuillez remplir tous les champs...";
            }
        }
    //Connection + requête à la bdd pour récupérer username et mail
    $sth = $pdo->prepare('SELECT * FROM user WHERE username = :username');
    $sth->bindParam(':username', $username);
    $sth->execute();
    $result = $sth->fetchAll();



    //Conditions à remplir pour se connecter à la bdd



}*/


    session_start();

    use App\Connection;

//require_once '../controllers/functions.php';
//require_once '../controllers/c-login.php';


    $pdo=(new Connection())->getPdo();


    $status="";



    $error=array();
// S'assurer que le champs est bien rempli
    if (isset($_POST['submit'])) {

        if (empty($username) || empty($password)) {
            echo "tous les champs sont requis";
        } else {
            $username=$_POST["username"];
            $password=$_POST["password"];
            $sth=$pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
            $sth->bindParam(':username', $username);
            $sth->execute(['username'=>$username, 'password'=>$password]);
            $result=$sth->fetchAll();
            header('location: ../views/explorateur');
        }


    }
//INSCRIPTION
    if (isset($_POST['submit']))

    {
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $sql="INSERT  INTO user (username, email, password)  VALUES('$username', '$email', '$password')";
        $pdo->exec($sql);

        <?php

use App\Connection;

$pdo = (new Connection())->getPdo();

$title = "mon site";
//ob_start();
session_start();
$erreur = array();
$title="Explorateur de fichier Valrika";

//if (isset($_POST['username'])){




    if (isset($_POST['username'])) {
        $username=$_POST["username"];
        $password=$_POST["password"];

        $sth=$pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
        $sth->bindParam(':username', $username);
        $sth->execute(['username'=>$username, 'password'=>$password]);
        $result=$sth->fetchAll();}

        header('location: ../views/explorateur');
        {
            echo "Vous êtes connecté";
        }


//if (!empty($username) && !empty($password)){
    //echo "tous les champs sont requis";




?>
//

    <div class="container w-50 h-50">
        <form action="">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="text">Identifiant</label>
                        <input type="text" class="form-control" id="username" aria-describedby="entrez votre email" placeholder="Identifiant">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                    </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-info">Se connecter</button>

                </div>
            </div>
        </form>
    </div>


<?php


//INSCRIPTION


if (isset($_POST['submit']))
    {
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $sql="INSERT  INTO user (username, email, password)  VALUES('$username', '$email', '$password')";
        $pdo->exec($sql);

        /*if (empty($username) || empty($email) || empty($password)) {
            $status="Tous les champs sont requis";
        } else {
            if (strlen($username) >= 255 || !preg_match("/^[a-zA-Z-'\s]+$/", $username)) {
                $status="Entrez un identifiant valide svp";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $status="Entrez un email valid svp";
            }
        }*/

}

//$content = ob_get_clean();

require 'header.php';


$pdo = new PDO('mysql:dbname=file_explorer;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$sql = "SELECT * FROM files ";
$query = $pdo->prepare($sql);
$query->execute();
$files = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET["url"])){

    // Téléchargement image
    $image=$_GET["url"];

    header('Content-Transfer-Encoding: none');
    header('Content-Type: application/octetstream; name="'.$image.'"');
    header('Content-Disposition: attachment; filename="'.$image.'"');
    header('Content-length: '.filesize($image));
    header("Pragma: no-cache");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
    header("Expires: 0");
    @readfile($image) OR die();

}

//nom du répertoire contenant les images à afficher
$nom_repertoire = '../file/';

//on ouvre le repertoire
$pointeur = opendir($nom_repertoire);
$i = 0;

//on les stocke les noms des fichiers des images trouvées, dans un tableau
while ($fichier = readdir($pointeur)){
    if (substr($fichier, -3) == "gif" || substr($fichier, -3) == "jpg" || substr($fichier, -3) == "png"
        || substr($fichier, -4) == "jpeg" || substr($fichier, -3) == "PNG" || substr($fichier, -3) == "GIF"
        || substr($fichier, -3) == "JPG")
    {
        $tab_image[$i] = $fichier;
        $i++;
    }
}

//on ferme le répertoire
closedir($pointeur);

//on trie le tableau par ordre alphabétique
array_multisort($tab_image, SORT_ASC);

?>

<?php if(isset($_SESSION['auth'])): ?>

    <h1 class="text-center">Bonjour <?= $_SESSION['auth']->role; ?> <?= $_SESSION['auth']->username; ?></h1>

    <h2 class="text-center">Bienvenue sur notre exploreur de fichier !</h2>

    <div class="table_home">

        <table class="table">

            <thead>

            <tr>

                <th scope="col">Image</th>

                <th scope="col">Nom</th>

                <th scope="col">Télécharger</th>

                <?php if(isset($_SESSION['auth']) && $_SESSION['auth']->role == 'admin'): ?>

                    <th scope="col">Supprimer</th>

                <?php endif; ?>

            </tr>

            </thead>

            <tbody>
                <tr scope="row">
                    <?php  //affichage des images (en 60 * 60 ici)
                        for($j = 0; $j <= $i - 1; $j ++) {
                            $image ='<img src="'.$nom_repertoire.'/'.$tab_image[$j].'" width="60" height="60">';
                            $dl = $tab_image[$j];
                            echo
                                "<tr>
                                    <td align=\"center\">$image</td>
                                    <td align=\"center\">$tab_image[$j]</td>
                                    <td align=\"center\"><a href=\"home.php?url=$dl\">Télécharger</a></td><br>
                                    <td> " ;
                                    if(isset($_SESSION['auth']) && $_SESSION['auth']->role == 'admin'){

                                        echo "<a href=\"../src/delete_image.php?image_delete=" . intval($files['id']) . "\"> Supprimer</a>";
                                    }
                                echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tr>
            </tbody>

        </table>

    </div>

<?php endif; ?>

<?php require 'footer.php'; ?>
?>

