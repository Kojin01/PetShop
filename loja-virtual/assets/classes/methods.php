<?php 
    class methods {
        private $pdo;
        public function connect(){
            if($this->pdo == null){
                try {
                    $this->pdo = new PDO('mysql:host='.DATABASE['host'].';dbname='.DATABASE['dbname'],DATABASE['username'],DATABASE['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                } catch (Exception $e) {
                    echo "Aconteceu algum erro, por favor contate um administrador";
                }
            }
            return $this->pdo;
        }
        public function getTotalItens(){
            if(isset($_SESSION['carrinho'])){
                $total = 0;
                foreach ($_SESSION['carrinho'] as $key => $value) {
                    $total += $value['quantidadeProduto'];
                }
            }else{
                return 0;
            }
            return $total;
        }
        public function curl($url_query,$build_quary){
                $url = $url_query."v2/checkout";
                $data = http_build_query($build_quary);

                $curl = curl_init($url);
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
                curl_setopt($curl,CURLOPT_POST,true);
                curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
                curl_setopt($curl,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
                $xml = curl_exec($curl);
                curl_close($curl);
                $xml = simplexml_load_string($xml);
                return $xml->code;
        }
    }


?>