<?php

    $conn=mysqli_connect("localhost","root","","tugasBesar");

    if(!$conn){
        die('Koneksi Error : '.mysqli_connect_errno()
        .' - '.mysqli_connect_error());
    }

    $result=mysqli_query($conn,"SELECT * FROM forum");


    function query($query_kedua)
    {
        
        global $conn;
        $result=mysqli_query($conn,$query_kedua);

        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }

    function registrasi($data)
    {
        global $conn;

        $username=strtolower(stripcslashes($data['username']));
        $email=mysqli_real_escape_string($conn,$data['email']);
        $password=mysqli_real_escape_string($conn,$data['password']);
        $password2=mysqli_real_escape_string($conn,$data['password2']);

        $result=mysqli_query($conn,"SELECT username FROM user where username='$username'");

        if(mysqli_fetch_assoc($result))
        {
            echo "
                <script>
                    alert('username sudah ada');
                </script>
            ";
            return false;
        }
        if($password!==$password2)
        {
            echo"
            <script>
                alert('password anda tidak sama');
            </script>
            ";
            return false;
        }
        
        $password=md5($password);
        $password=password_hash($password,PASSWORD_DEFAULT);
        var_dump($password);
        mysqli_query($conn,"INSERT INTO user values('','$username','$email','$password')");

        return mysqli_affected_rows($conn);
    }

    function create($data)
    {
        global $conn;

        $judul=htmlspecialchars($data['judul']);
        $isi=htmlspecialchars($data['isi']);

        $query= " INSERT INTO posting
                    VALUES
                    ('','$judul','$isi')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }

    function cari($keyword)
    {
        $sql="SELECT * from posting
            WHERE
            judul LIKE '%$keyword%' OR
            isi LIKE '%$keyword%'
            ";
        return query($sql);
    }

    function komen($data)
    {
        global $conn;

        $isi_komen=htmlspecialchars($data['komen']);

        $query= " INSERT INTO komen
                    VALUES
                    ('','$isi_komen')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }

    function hapus($id_posting){
        global $conn;

        mysqli_query($conn,"DELETE FROM posting WHERE id_posting = $id_posting ");
        
        return mysqli_affected_rows($conn);
    }
?>