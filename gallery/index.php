<?php
/*
 * Created on Wed Feb 09 2022 2:44:09 AM
 *
 * Author     : Mile S.
 * Contact    : info@ccwebspot.com
 * Website    : https://ccwebspot.com/
 * Copyright (c) 2022 CC.Webspot
 *
 */

    include '../config/database.php';

    // Get ImagePath from database
    $sql = "SELECT * FROM images";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery CMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="container gallery-container">
        <p class="page-description text-center">
            <a href="" data-toggle="modal" data-target="#myModal">Add photo</a>
        </p>
        <div class="tz-gallery">
            <div class="row">
                <?php
                    if(empty($result)) {
                        echo "There is not images upload. Please <a herf='' data-toggle='modal' data-target='#myModal'>Upload images</a>.";
                    }
                    foreach ($result as $row) {
                ?>
                <div class="col-sm-12 col-md-4">
                    <a class="lightbox delete" href="../assets/uploads/<?php echo $row['imagePath']; ?>">
                        <img src="../assets/uploads/<?php echo $row['imagePath']; ?>" alt="<?php echo $row['title']; ?>">
                    </a>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <form enctype="multipart/form-data" id="galleryForm" action="../app/insert.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                        <h4 class="modal-title">Upload new photo</h4>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Photo title"><br/><br/>
                        <input type="file" name="imagePath" id="imagePath" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                        <input class="btn btn-success" type="submit" onclick="data()" value="Upload">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (e){
            $("#galleryForm").on('submit',(function(e){ e.preventDefault();
                $.ajax({
                    url: "../app/insert.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false, cache: false, processData:false,
                    success: function(data){
                        alert("Photo uploaded!");
                    },
                    error: function(){}
                });
            }));
        });
    </script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>

</body>
</html>