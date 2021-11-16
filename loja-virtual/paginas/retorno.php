<?php include("../config.php");
    $metodos = new methods();
    if(isset($_POST['notificationType']) && $_POST["notificationType"] == "transaction"){
        $url = URL_WS."v2/transactions/notifications/".$_POST['notificationCode']."?email=".EMAIL."&token=".TOKEN;
        $curl = curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        $xml = curl_exec($curl);
        curl_close($curl);
        if($xml == "Unauthorized"){
            die("Ocorreu algum erro, por favor contatar um administrador");
        }
        $transaction = simplexml_load_string($xml);
        $transactionStatus = $transaction->status;

        switch ($transactionStatus) {
            case '1': //Quando o pagamento esta sendo aguardado.
                $reference = $transaction->reference;
                $metodos->connect()->exec("UPDATE `tb_admin.pedidos` SET situacao = 'Aguardando pagamento' WHERE referencia_id = '$reference'");
                break;
            case '2': //Qaundo o pagamento esta em analise.
                $reference = $transaction->reference;
                echo $reference;
                $metodos->connect()->exec("UPDATE `tb_admin.pedidos` SET situacao = 'Pagamento em análise' WHERE referencia_id = '$reference'");
                //print_r($transaction->items->item[1]); Aqui é para pegar itens específicos
                break;
            case '3': // Quando o pagamento é pago.
                $reference = $transaction->reference;
                $metodos->connect()->exec("UPDATE `tb_admin.pedidos` SET situacao = 'Pagamento pago' WHERE referencia_id = '$reference'");
                break;
            case '4': // Quando o porduto está disponivel.
                $reference = $transaction->reference;
                $metodos->connect()->exec("UPDATE `tb_admin.pedidos` SET situacao = 'Disponivel' WHERE referencia_id = '$reference'");
                break;
            case '5': 
                $reference = $transaction->reference;
                $metodos->connect()->exec("UPDATE `tb_admin.pedidos` SET situacao = 'Produto em disputa' WHERE referencia_id = '$reference'");
                break;
            case '6': //Quando o pagamento é devolvido
                $reference = $transaction->reference;
                $metodos->connect()->exec("UPDATE `tb_admin.pedidos` SET situacao = 'Pagamento devolvido' WHERE referencia_id = '$reference'");
                break;
            case '7': // Quando a compra é cancelada.
                $reference = $transaction->reference;
                $metodos->connect()->exec("UPDATE `tb_admin.pedidos` SET situacao = 'Compra cancelada' WHERE referencia_id = '$reference'");
                break;
        }
    }




?>