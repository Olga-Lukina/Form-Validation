<?php
$errors = [];

// first name validation
if (strlen($_POST['firstname']) < 2) {
    $errors ['firstname'] = "Please enter a valid firstname";
}


?>