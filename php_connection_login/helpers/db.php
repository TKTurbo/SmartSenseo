<?php
// voor de connectie
$dbHost = '127.0.0.1';
$dbName = 'scn';
$dbUser = 'root';
$dbPassword = '';
// voor de globale variabelen
$db_connection = null;
$db_query = null;

// function voor de connectie
function dbConnect(){
    global $dbHost, $dbName, $dbUser, $dbPassword, $db_connection;

    try {
        $db_connection = new PDO("mysql:host=$dbHost; dbname=$dbName", $dbUser, $dbPassword);
    } catch(PDOException $error) {
        return false;
    }
    return true;
}

// functie voor een sql statement
function dbQuery($sql, $array = []){
    global $db_connection, $db_query;

    $db_query = $db_connection->prepare($sql);

    return $db_query->execute($array);
}

// hier db get voor de fetch
function dbGet(){
    global $db_query;
    return $db_query->fetch(PDO::FETCH_ASSOC);
}

// hier de fetch all
function dbGetAll(){
    global $db_query;
    return $db_query->fetchAll(PDO::FETCH_ASSOC);   
}

// hier een dbcount voor de rowcount
function dbCount(){
    global $db_query;//voor alle code leesbaar
    return $db_query->rowCount();
}