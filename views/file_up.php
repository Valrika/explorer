<?php
use App\Connection;
$pdo = (new Connection())->getPdo();

if (isset($_POST['submit'])) {
    $output_dir="Files/";/* Path for file upload */
    $RandomNum=time();
    $ImageName=str_replace(' ', '-', strtolower($_FILES['image']['name'][0]));
    $ImageType=$_FILES['image']['type'][0];

    $ImageExt=substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt=str_replace('.', '', $ImageExt);
    $ImageName=preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName=$ImageName . '-' . $RandomNum . '.' . $ImageExt;
    $ret[$NewImageName]=$output_dir . $NewImageName;

    /* Try to create the directory if it does not exist */
    if (!file_exists($output_dir)) {
        @mkdir($output_dir, 0777);
    }
    move_uploaded_file($_FILES["image"]["tmp_name"][0], $output_dir . "/" . $NewImageName);
    $sql="INSERT INTO `img`(`image`)VALUES ('$NewImageName')";
    if ($pdo->exec($sql)) {
        echo "successfully !";
    } else {
        echo "Error: ";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Insert Image in MySql using PHP</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image[]" />
    <button type="submit">Upload</button>
</form>
</body>
</html>