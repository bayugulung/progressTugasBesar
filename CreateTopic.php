<?php

    $conn=mysqli_connect("localhost","root","","tugasBesar");

    if(isset($_POST['submit']))
    {
        $judul=$_POST['judul'];
        $isi=$_POST['isi'];

        $query= "INSERT INTO posting
                VALUES
                ('','$judul','$isi')";
        mysqli_query($conn,$query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BOOTLOOP.ID</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<style>
    .require {
        color: #666;
    }
    label small {
        color: #999;
        font-weight: normal;
    }
</style>
<body>
    <div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
    		    <h1>Create post</h1>
    		    <form action="Create.php" method="post" enctype="multipart/from-data">
    		        <div class="form-group">
    		            <label for="judul">Judul Topik</label>
    		            <input type="text" class="form-control" name="judul" required/>
    		        </div>
    		        <div class="form-group">
    		            <label for="isi">Deskripsi</label>
    		            <textarea rows="5" class="form-control" name="isi" required></textarea>
    		        </div>
    		        <div class="form-group">
    		            <button type="submit" class="btn btn-primary" name="submit">Posting</button>
                        <a class="btn btn-default" href="Index.php">Batal</a>
    		        </div>
    		    </form>
		    </div>
        </div>
    </div>
</body>
</html>