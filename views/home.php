<?php

//indexView

<?php

use App\Connection;

$pdo = (new Connection())->getPdo();


if (isset($_POST["submit"])) {
    dd($_FILES);
}


?>


<?php require 'block/template.html' ?>

<div class="mt-5 container col-md-6">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" class="form-control-file">
        <button type="submit" name="submit" class="btn btn-primary mt-3">Upload</button>
    </form>
</div>


<?php

?>