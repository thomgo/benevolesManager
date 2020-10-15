<?php

//Function qui retourne un tableau contenant les routes de notre application

//Modèle des routes
//"NomDeLaRoute" => [
//  "Controller",
//  "Fonction",
//  Optionnel [
//    "parametre1" => ["typeAttendu", optionnel[valeurAttendu]],
//    "parametre2" => ["typeAttendu", optionnel[valeurAttendu]]
//  ]
// "status" => "role"
//]
function getRoutes() {
  return [
    "" => [
      "front",
      "loginUser"
    ],
    "logout" => [
      "front",
      "logoutUser"
    ],
    "accueil" => [
      "front",
      "listUsers",
      "status" => "admin"
    ],
    "user/sort" => [
      "front",
      "sortUsers",
      "status" => "admin"
    ],
    "user/new" => [
      "front",
      "newUser",
      "status" => "admin"
    ],
    "user/remove" => [
      "front",
      "removeUser",
      [
        "id"=>["integer"]
      ],
      "status" => "admin"
    ],
    "user/modify" => [
      "front",
      "modifyUser",
      [
        "id"=>["integer"]
      ],
      "status" => "admin"
    ],
    "message" => [
      "message",
      "listMessage",
      "status" => "user"
    ],
    "message/new" => [
      "message",
      "newMessage",
      "status" => "user"
    ],
    "message/remove" => [
      "message",
      "removeMessage",
      [
        "id" => ["integer"]
      ],
      "status" => "user"
    ]
  ];
}

 ?>
