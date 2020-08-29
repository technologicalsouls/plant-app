<?php session_start();
if(isset($_SESSION['plantid'])){
    unset($_SESSION['plantid']);
    };
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="cache-control" content="no-cache">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <title>"My G"reens : Your Best Plant Planner Bud </title>
    </head>
    <body>
        <header>
            <?php require_once('partials/nav.php'); ?>
        </header>
        <!-- ADD NEW FOLIAGE -->
        <div id="index-add-foliage" class="container-fluid">

            <div  class="row">
                <div class="col d-flex flex-column align-items-center">

                    <a id="anf" class="add-btn">
                        <div class="add-btn-tag">click me to add a plant </div>
                    </a>

                    <div id="f-form" class="hide">
                        <form class="text-left" method="POST" action="dh-add-foliage.php"
                              enctype="multipart/form-data">
                            <div class="form-group d-flex flex-column">
                                <label for="pnn">Name your foliage:</label>

                                <input type="text" name="pnn" placeholder="Arnold" required>
                            </div>

                            <div class="form-group d-flex flex-column">
                                <label for="plantvarietyF">Find your foliage variety:</label>
                                <input type="text" class="plantlist" required name="plantvarietyF" list="fList"
                                       placeholder="Select from this list">
                                <datalist id="fList"></datalist>
                            </div>

                            <div id="wq" class="form-group d-flex flex-md-column">
                                <label for="wyn">Have you watered your plant in the past 7 days?</label>
                                <br>
                            <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="wyn" class="custom-control-input" name="wyn" value="yes">
                            <label class="custom-control-label" for="wyn">Yes, I have!</label>
                            </div>
                                <div id="yw" class="hide">
                                    <label style="color: rgb(1, 127, 0); text-transform: lowercase;">Select the day you
                                        last watered this plant:</label>
                                    <select style="color: rgb(0, 0, 255); text-transform: lowercase;" type="select"
                                            name="lwd">
                                        <option disabled selected value> -- Select Day -- </option>
                                        <?php
                                        for ( $xb = 0; $xb <7 ; $xb++ ){
                                            $td = strtotime('today');
                                            $md = '-'.$xb.'days';
                                            $md = ''.$md.'';
                                            $dy = strtotime($md , $td);
                                            $sd = date( "D m/d/Y" , $dy );
                                                echo '<option value = "'.$sd.'">'.$sd.'</option>';
                                        };
                                    ?>
                                    </select>
                                </div>


                            <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="wn" class="custom-control-input" name="wyn" value="no">
                            <label class="custom-control-label" for="wn">No, I haven't.</label>
                            </div>
                                <div id="nw" class="hide">
                                    <label style="color: rgb(1, 127, 0); text-transform: lowercase;">Select day this
                                        week you want to start watering this plant:</label>
                                    <select style="color: rgb(0, 0, 255); text-transform: lowercase;" type="select"
                                            name="wsd" id="nwday">
                                        <option disabled selected value> -- Select Day -- </option>
                                        <?php
                                        for ( $xt = 0; $xt <7 ; $xt++ ){
                                            $td = strtotime('today');
                                            $md = '+'.$xt.'days';
                                            $md = ''.$md.'';
                                            $dy = strtotime( $md , $td);
                                            $sd = date( "D m/d/Y" , $dy );
                                            echo '<option value = "'.$sd.'">'.$sd.'</option>';
                                        };
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="pic-upld">
                                <label for="photo">Upload a profile picture of your plant</label>
                                <input type="file" name="photo" required>
                                <br>
                            </div>
                            <input id="add-new-btn" type="submit" class="mt-5" value="Add New Plant">
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="assets/script/addNewPlantsScript.js"></script>

    </body>

</html>
