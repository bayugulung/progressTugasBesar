<?php
    require'Functions.php';

    $id_posting=$_GET["id_posting"];

    if( hapus ($id_posting)>0){
        echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href='IndexAdmin.php';
            </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal dihapus');
            document.location.href='IndexAdmin.php';
            </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
?>