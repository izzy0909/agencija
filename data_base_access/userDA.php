<?php

include_once 'connection.php';


function loginUser($username, $password)
{
    global $conn;

    $sql = "SELECT * FROM korisnici WHERE username = :username AND password = :password LIMIT 1";
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':username' => $username,
        ':password' => md5($password)
        ));
   return $query->fetch();

}

function prikaziSveKorisnike(){
    global $conn;

    $sql = "SELECT id, username FROM korisnici";
    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_BOTH);
    
}

function dodajKorisnika($username, $password)
{
    global $conn;

    $sql = "INSERT INTO korisnici (id, username, password, uloga)
            VALUES              ('', :username, :password, '1')";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':username' => $username,
                ':password' => md5($password)
        ));

}

function izbrisiKorisnika($id){
    global $conn;

    $sql = "DELETE FROM korisnici
            WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));

}