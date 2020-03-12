<?php

    require "config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $response = array();
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $cek = "SELECT
                   id_user, 
                   username,
                   PASSWORD
                FROM
                    scada.users
                WHERE 
                    username='$username' 
                AND 
                    password='$password'";

        $query = oci_parse($connect, $cek);
        oci_execute($query);
        $result = oci_fetch_array($query, OCI_BOTH);

        if (isset($result)) {
            # code...
            $response['value'] = 1;
            $response['message'] = "Login Berhasil";
            $response['id_user'] = $result['id_user'];
            $response['username'] = $result['username'];
            echo json_encode($response);
        } else {
           # code...
           $response['value'] = 0;
           $response['message'] = "Login Gagal";
           echo json_encode($response);
        }
        
        
       
        
    }
?>