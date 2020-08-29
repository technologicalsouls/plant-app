<?php session_start();

if(!isset($_POST['submit'])){
    header('location:all-foliage.php');
};

$plantid = $_POST['plantid'];

$plantdata = file_get_contents('users/all-foliage.json');
$plantdata = json_decode( $plantdata, true );

$plantdata[$plantid]['pnn'] = $_POST['pnn'];
$_SESSION['pnn'] = $pnn = $plantdata[$plantid]['pnn'];

// IMAGE
$tmp = $_FILES['photo']['tmp_name'];
mkdir ('yourplants/'.$plantid);
$img = 'yourplants/'.$plantid.'/mainpic.jpg';
move_uploaded_file( $tmp, $img );

$plantdata[$plantid]['img'] = $img;
$_SESSION['img'] = $plantdata[$plantid]['img'];

$plantdata = json_encode($plantdata);
file_put_contents('users/all-foliage.json', $plantdata);

if($_SESSION['plantid'] == $plantid){
    $_SESSION['pnn'] == $_POST['pnn'];
}

header('location:plant-profile.php?'.$_SESSION['plantid']);