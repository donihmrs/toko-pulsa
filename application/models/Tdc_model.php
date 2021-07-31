<?php
    class Tdc_model extends CI_Model {
        private $paymentToken = "9iEz8DVXVgZN4qDIVmtFoj2LObGTyFtK";

        public function virtualAccount($req)
        {
            $curl = curl_init();

            $url = "https://api.tdcdigital.id/api/va/payment";

            $data = array(
                "content-type: application/x-www-form-urlencoded",
            );

            $post = array(
                'apiToken' =>  $this->paymentToken,
                'paymentMethod' => "VA",
                'transactionId' => $req['transaksi'],
                'bankName' => $req['bank'],
                'amount' => $req['total'],
                'name' => $req['nama']
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
        
        public function ovo($req)
        {
            $curl = curl_init();

            $url = "https://api.tdcdigital.id/api/ovo/payment";
                
            $data = array(
                "content-type: application/x-www-form-urlencoded",
            );

            $post = array(
                'apiToken' =>  $this->paymentToken,
                'paymentMethod' => "OVO",
                'transactionId' => $req['transaksi'],
                'amount' => $req['total'],
                'phoneNumber' => $req['hp']
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
    }
?>