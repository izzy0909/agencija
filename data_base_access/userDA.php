<?php

include_once 'connection.php';


function loginUser($username, $password)
{
    global $conn;

    $sql = "SELECT * FROM korisnici WHERE username = :username AND password = :password LIMIT 1";
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':username' => $username,
        ':password' => $password
        ));
   return $query->fetch();

}

function prikaziSveKorisnike(){
    global $conn;

    $sql = "SELECT * FROM korisnici";
    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);
    
}