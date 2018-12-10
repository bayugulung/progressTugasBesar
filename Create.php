<?php
    require 'Functions.php';

    if(isset($_POST['submit']))
    {
        //var_dump($_post);
        //die();
        if(create($_POST)>0)
        {
            echo "
            <script>
                alert('topik berhasil dibuat');
                document.location.href='Index.php';
            </script>

            ";
        }else
        {
            echo "
            <script>
                alert('topik gagal dibuat');
                document.location.href='CreateTopic.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
?>