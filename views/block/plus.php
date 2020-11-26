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

    $title="Explorateur de fichier Valrika";

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


    ?>