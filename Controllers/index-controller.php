<?php

require './Models/database.php';
require './Models/user.php';

if (!empty($_POST)) {
    $errors = array();

    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z]+$/', $_POST['username'])) {
        $errors['username'] = "La saisie n'est pas valide.";
    } else {
        $userObj = new User();
        $checkUsername = $userObj->checkDoubleUsername($_POST['username']);

        if ($checkUsername) {
            $errors['username'] = 'Ce nom d\'utilisateur est déjà utilisé.';
        }
    }
    // debug($errors);
    // die();


    // if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    //     $errors = "Votre email n'est pas valide.";
    // } ajouter check erreur du mail

    if (empty($_POST['password'])) {
        $errors = "Mot de passe non valide.";
    }

    if (empty($errors)) {
        $hashUserPassword = $userObj->hashPassword($_POST['password']);
        $newUser = $userObj->InsertUserInDbh($_POST['username'], $hashUserPassword, $_POST['email']);
        die('Votre compte a bien été créé.');
    }

    debug($errors);
};
