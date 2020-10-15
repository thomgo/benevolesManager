<?php
require "model/userManager.php";

function loginUser() {
  if(!empty($_POST)) {
    $user = getUserByPseudo($_POST);
    if(!empty($user) && password_verify($_POST["password"], $user["password"])) {
      initializeUserSession($user);
      redirectTo("message");
    }
  }
  require "view/loginView.php";
}

function logoutUser() {
  logout();
  redirectTo("");
}

function listUsers() {
  $users = getUsers();
  foreach ($users as $key => $user) {
    $users[$key]["available"] = ($user["available"]) ? "Disponible" : "Indisponible";
  }
  require "view/listUsersView.php";
}

function removeUser() {
  if(deleteUser($_GET["id"])) {
    header("Location: ../accueil");
    exit;
  }
}

function newUser() {
  $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
  addUser($_POST);
  header("Location: ../accueil");
  exit;
}

function modifyUser() {
  if(!empty($_POST)) {
    updateUser($_POST);
    header("Location: ../accueil");
  }
  $user = getUser($_GET["id"]);
  if(empty($user)){
    header("Location: ../accueil");
  }
  require "view/modifyUserView.php";
}

function sortUsers() {
  $users = getSortedUsers($_POST);
  require "view/listUsersView.php";
}

 ?>
