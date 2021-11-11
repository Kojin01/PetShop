<?php 
    class methods {
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
    }
    

?>