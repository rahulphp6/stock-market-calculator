<?php include_once 'fnctions.php';
if (isset($_POST['stock_sell'])) {
    extract($_POST);
    if(!empty($sell)){
        echo getProfit($buy, $buy_qty, $sell, $sell_qty);
    }
}
