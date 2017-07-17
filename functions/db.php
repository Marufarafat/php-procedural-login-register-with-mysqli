<?php

/**
* connect to database
**/

$con = mysqli_connect('localhost', 'root', 'root', 'loginSystem');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/**
* database helper functions
**/

function row_count($result){
    return mysqli_num_rows($result);
}
function escape($string){
    
    global $con;
    return mysqli_real_escape_string($con, $string);
}

function query($sql){
    global $con;
    return mysqli_query($con, $sql);
}

function confirm($result){
    global $con;
    
    if(!$result){
        die("Query faild ". mysqli_error($con));
    }
}

function fetch_array($result){
    
    return mysqli_fetch_array($result);
}