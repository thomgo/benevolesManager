<?php
require "model/messageManager.php";
require "model/userManager.php";

function listMessage() {
  $messages = getMessages($_SESSION["user"]["id"]);
  require "view/listMessageView.php";
}

function newMessage() {
  if(!empty($_POST)) {
    $getter = getUserByPseudo($_POST);
    if(!empty($getter)) {
      $_POST["pseudo"] = $getter["id"];
      if(addMessage($_POST, $_SESSION["user"]["id"])){
        redirectTo("message");
      }
    }
  }
  require "view/newMessageView.php";
}

function removeMessage() {
  deleteMessage($_GET["id"]);
  redirectTo("message");
}

 ?>
