<?php session_start();
if(isset($_SESSION['plantid'])){
unset($_SESSION['plantid']);
};

if(isset($_SERVER['QUERY_STRING'])){
$_SESSION['plantid'] = $plantid = $_SERVER['QUERY_STRING'];
};
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
        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <title>"My G"reens : Edit Plant</title>
    </head>

    <body>
        <header>
            <?php require_once "partials/nav.php"; ?>
        </header>
        <?php
            $plantdata = file_get_contents("users/all-foliage.json");
            $plantdata = json_decode($plantdata, true);
            $_SESSION['pnn'] = $plantdata[$plantid]['pnn'];
            $_SESSION['img'] = $plantdata[$plantid]['img'];
            $_SESSION['pv'] = $plantdata[$plantid]['pv'];
            $_SESSION['lwd'] = $plantdata[$plantid]['lwd'];
            $_SESSION['nwd'] = $plantdata[$plantid]['nwd'];
            $_SESSION['addedOn'] = $plantdata[$plantid]['addedOn'];
        ?>
        <div class="container mt-md-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="pnn-tag"><?php echo $_SESSION['pnn']; ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 pic-frame">
                    <img class="plant-prof-pic" src="<?php echo $_SESSION['img']; ?>">
                </div>
                <div class="col-12 col-md-6">
                    <form class="mt-3" method="POST" action="dh-foliage-edit.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="pnn">Edit Name </label><br>
                            <input class="form-control" id="pnn" type="text" name="pnn"
                                   value="<?php echo $_SESSION['pnn']; ?>"
                                   placeholder="<?php echo $_SESSION['pnn']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="photo">Edit Picture</label>
                            <input class="form-control" type="file" id="photo" name="photo">
                        </div>
                        <input type="hidden" name="plantid" value="<?php echo $_SESSION['plantid']; ?>">
                        <input type="submit" name="update" class="update-btn mt-md-4" value="Save Changes">
                    </form>
                    <div class="d-modal mx-auto mt-auto">
                        <button type="button" class="delete-btn" data-toggle="modal"
                                data-target="#deleteplant<?php echo $_SESSION['plantid']; ?>">Delete
                            <?php echo $_SESSION['pnn']; ?></button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deleteplant<?php echo $_SESSION['plantid']; ?>" tabindex="-1" role="dialog"
                 aria-labelledby="deleteplantLabel<?php echo $_SESSION['plantid']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteplantLabel<?php echo $_SESSION['plantid']; ?>">Delete this
                                plant?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this plant?
                        </div>
                        <div class="modal-footer">
                            <a href="plant-edit.php?<?php echo $_SESSION['plantid']; ?>" class=" update-confirm-btn">No,
                                keep it.</a>
                            <a href="dh-foliage-delete.php?<?php echo $_SESSION['plantid']; ?>"
                               class="delete-confirm-btn">Yes,
                                delete!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
        </script>

    </body>

</html>