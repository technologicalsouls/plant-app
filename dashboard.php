<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="cache-control" content="no-cache">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- bs css cdn -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/23838f0113.js" crossorigin="anonymous"></script>
        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <title>"My G"reens : Your Best Plant Planner Bud</title>
    </head>

    <body>
        <header>
            <?php require_once "partials/nav.php"; ?>
        </header>

        <div class="container" id="mainDisplay">
            <h3 class="text-center mb-5">Today is: <span id="today-date"></span></h3>
            <p class="text-center">click on plant name tag to mark it watered today</p>
            <h4 class="dheader">today's watering plan</h4>
            <div class="row flex-wrap justify-content-center justify-content-xl-start dash-display" id="todayDisplay">
            </div>
            <h4 class="dheader">past due</h4>
            <div class="row flex-wrap justify-content-center justify-content-xl-start dash-display" id="pastDueDisplay">
            </div>
            <h4 class="dheader">completed today</h4>
            <div class="row flex-wrap justify-content-center justify-content-xl-start dash-display"
                 id="todayCompletedDisplay">
            </div>
            <h4 class="dheader">upcoming</h4>
            <div class="row flex-wrap justify-content-center justify-content-xl-start dash-display"
                 id="upcomingDisplay">
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjxlVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
        <script src="assets/script/dashboard.js"></script>
    </body>

</html>