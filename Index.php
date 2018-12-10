<?php
    session_start();
    if(!isset($_SESSION["login"]))
    {
        echo $_SESSION["login"];
        header("Location:Login.php");
        exit;
    }
    require 'Functions.php';
    $posting=query(" SELECT * FROM posting");
    if(isset($_POST["cari"]))
    {
        $posting=cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BOOTLOOP.ID</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
      
    }img {
        width: 100%;
        height: 450px;
    }
</style>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="Index.php">BOOTLOOP.ID</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div>    
        <img class="img" src="img\background.jpg">
    </div>
    <div class="container">
        <br>
        <a class="btn btn-success" href="CreateTopic.php">Buat Topik Baru</a>
    </div>
    <div class="container">
        <h2>Topik Tersedia</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <?php foreach($posting as $row):?>
                <tr>
                    <td><?= $row['judul']; ?></td>
                    <td>
                        <a href="View.php?id_posting=<?php echo $row['judul'];?>">View</a>
                    </td>
                </tr>
                    <?php endforeach;?>
                </tr>
            </thead>
        </table>
    </div>
    <footer class="container-fluid text-center">
        <p>Creator : Bayu Gulung Angkoro  |  Template By : www.w3School.com</p>
    </footer>
</body>
</html>
