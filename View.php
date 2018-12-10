<?php

    $conn=mysqli_connect("localhost","root","","tugasBesar");

    if(isset($_POST['submit']))
    {
        $isi_komen=$_POST['komen'];

        $query= "INSERT INTO komen
                VALUES
                ('',$isi_komen')";
        mysqli_query($conn,$query);
    }
    require 'Functions.php';
    $posting=query(" SELECT * FROM posting");
    $komen=query(" SELECT * FROM komen");
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BOOTLOOP.ID</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <br>
    <div class="container">          
        <table class="table table-bordered">
            <tr>
                <th>Komentar</th>
            </tr>
            <?php foreach($komen as $row):?>
            <tr>
                <td><?= $row['isi_komen']; ?></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
    <div class="container">
        <form action="Komen.php" method="post" enctype="multipart/from-data">
            <div class="form-group">
                <label for="komen">Masukkan Komentar</label>
                <textarea name="komen" class="form-control" id="komen" required></textarea>
            </div>
            <div class="form-group">
    		    <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
                <a class="btn btn-default" href="Index.php">Batal</a>
    	    </div>
        </form> 
    </div>
</body>
</html>