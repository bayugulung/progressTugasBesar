<?php
    require 'Functions.php';

    if(isset($_POST['submit']))
    {
        if(komen($_POST)>0)
        {
            echo "
            <script>
                alert('berhasil');
                document.location.href='View.php';
            </script>

            ";
        }else
        {
            echo "
            <script>
                alert('gagal');
                document.location.href='View.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
        
    }