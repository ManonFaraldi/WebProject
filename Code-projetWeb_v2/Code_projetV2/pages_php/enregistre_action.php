<?php
session_start();
require_once "../includes/functions.php";
//session_start();
echo $_POST["titre"]."<br/>";
echo $_POST["sujet"]."<br/>";
echo $_POST["lieu"]."<br/>";
$today = date("d-m-Y");
//echo $today;

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


if ($_SESSION['user']->LABEL_ROLE_USER == "ADMIN" || $_SESSION['user']->LABEL_ROLE_USER == "MOD")
{
    $sql = "insert into actions (SUJET_ACT,DATE_ACT,LIEU_ACT,TITRE_ACT, IMG_ACT, VALIDE_ACT) values ('".$_POST['sujet']."','".$today."','".$_POST['lieu']."','" .$_POST['titre']."','" .$target_file."1')";
}
else{
    $sql = "insert into actions (SUJET_ACT,DATE_ACT,LIEU_ACT,TITRE_ACT, IMG_ACT, VALIDE_ACT) values ('".$_POST['sujet']."','".$today."','".$_POST['lieu']."','" .$_POST['titre']."','" .$target_file."')";

}
    $resultat = $connexion->query($sql);
    
    redirect("actions.php");


?>