<?php
    function check($nomor)
    {
        $paymentToken = "9iEz8DVXVgZN4qDIVmtFoj2LObGTyFtK";

        $curl = curl_init();

        $url = "https://api.tdcdigital.id/api/getPaymentStatus";

        $data = array(
            "content-type: application/x-www-form-urlencoded",
        );

        $post = array(
            'apiToken' =>  $paymentToken,
            'transactionId' => $nomor,
        );

        curl_setopt($curl, CURLOPT_URL,$url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,$post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    $mysqli = new mysqli("localhost","doni","qwerty888","tokotdc");

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    // Perform query
    if ($result = $mysqli -> query("SELECT no_transaksi,status FROM transaksi")) {
        // Free result set
        while($row = mysqli_fetch_array($result)){
            $res = check($row['no_transaksi']);
            $res = json_decode($res);
            if ($res->Error == 0) {
                if ($row['status'] == 1) {
                    if (strtoupper($res->data->status) == "COMPLETED" || strtoupper($res->data->status) == "PAID" || strtoupper($res->data->status) == "SUCCESS_COMPLETED") {
                        $sql = "UPDATE transaksi SET status='5' WHERE no_transaksi=".$row['no_transaksi'];

                        $mysqli->query($sql);
                    } else if (strtolower($res->data->status) == "pending") {
                        
                    } else {
                        $sql = "UPDATE transaksi SET status='0' WHERE no_transaksi=".$row['no_transaksi'];

                        $mysqli->query($sql);
                    }
                }
            }
        }
    }
    
    $mysqli -> close();