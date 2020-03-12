<?php

    require "config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $response = array();
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $cek = "SELECT
                   ID_USER, 
                   USERNAME,
                   PASSWORD
                FROM
                    SCADA.USERS
                WHERE 
                USERNAME='$username' 
                AND 
                PASSWORD='$password'";

        $query = oci_parse($connect, $cek);
        oci_execute($query);
        $result = oci_fetch_array($query, OCI_BOTH);

        if ($result['ID_USER'] !== null) {
            # code...
            $response['value'] = 1;
            $response['message'] = "Login Berhasil";
            $response['id_user'] = $result['ID_USER'];
            $response['username'] = $result['USERNAME'];
            echo json_encode($response);
        } else {
           # code...
           $response['value'] = 0;
           $response['message'] = "Login Gagal";
           echo json_encode($response);
        }
        
        
       
        
    }
?>