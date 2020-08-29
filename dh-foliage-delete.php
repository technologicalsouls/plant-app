<?php session_start();

$plantid = $_SERVER['QUERY_STRING'];

$plantdata = file_get_contents('users/all-foliage.json');
$plantdata = json_decode($plantdata , true);

unset($plantdata[$plantid]);

$plantdata = json_encode($plantdata);
file_put_contents('users/all-foliage.json', $plantdata);

if($_SESSION['plantid'] == $plantid){
    session_destroy();
    header('location:all-foliage.php');
} else {
    header('location:all-foliage.php');
};