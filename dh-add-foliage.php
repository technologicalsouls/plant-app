<?php session_start();

$plantdata = file_get_contents('users/all-foliage.json');
$plantdata = json_decode( $plantdata, true );

$index = count( $plantdata );

$index++;

$plantid = array_keys($plantdata);
// var_dump(array_keys($plantdata));

$plantid = max($plantid) + 1;
$plantdata[$plantid];
$_SESSION['plantid'] = $plantid;
$wyn = $_POST['wyn'];
$pnn = $_POST['pnn'];
$pv = $_POST['plantvarietyF'];
$addedOn = date('D m/d/Y');

// IMAGE
$tmp = $_FILES['photo']['tmp_name']; // upload file capture
mkdir ('yourplants/'.$plantid);
$img = 'yourplants/'.$plantid.'/mainpic.jpg';
move_uploaded_file( $tmp, $img );
$_SESSION['img'] = $img;

function nextWaterDate( $lwd ){
    $fcon = substr( $lwd , -10);
    $nwd = date_create( $fcon );
    $nwd = date_add( $nwd, date_interval_create_from_date_string("7 days"));
    $nwd = date_format($nwd, 'D m/d/Y');
    return $nwd;
};

if ($wyn == 'yes' && isset($_POST['lwd'])){
    $_SESSION['lwd'] = $lwd = $_POST['lwd'];
    $_SESSION['wsd'] = $wsd = $lwd;
    $nwd = nextWaterDate( $lwd );
    $_SESSION['nwd'] = $nwd;
} else {
    $_SESSION['wsd'] = $wsd = $_POST['wsd'];
    $_SESSION['nwd'] = $nwd = $wsd;
    $_SESSION['lwd'] = $lwd = '';
};

$plantdata[$plantid]['pnn'] = $_SESSION['pnn'] = $pnn;
$plantdata[$plantid]['pv'] = $_SESSION['pv'] = $pv;
$plantdata[$plantid]['fq'] = $_SESSION['fq'] = '7 days';
$plantdata[$plantid]['nwd'] = $_SESSION['nwd'];
$plantdata[$plantid]['lwd'] = $_SESSION['lwd'];
$plantdata[$plantid]['wsd'] = $_SESSION['wsd'];
$plantdata[$plantid]['addedOn'] = $_SESSION['addedOn'] = $addedOn;
$plantdata[$plantid]['pt'] = $_SESSION['pt'] = 'Foliage';
$plantdata[$plantid]['img'] = $_SESSION['img'];


$plantdata = json_encode($plantdata);
file_put_contents('users/all-foliage.json', $plantdata);

header('location:plant-profile.php?'.$_SESSION['plantid']);