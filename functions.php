<?php
function SellingPrice($CP, $PP)
{
    $P_decimal = 1 + ($PP / 100);
    $res = $P_decimal * $CP;

    return $res;
}
function getProfit($buy, $buy_qty, $sell, $sell_qty)
{
    $total_invest = $buy * $buy_qty;
    $total_sell = $sell * $sell_qty;
    $profit = $total_sell - $total_invest;
    return round($profit);
}
// content management
function content($contentPath, $lenth = 1000)
{
    $filename = $contentPath;
    $rahulphpArray = [];
    // Open the file for reading
    if (($h = fopen("{$filename}", "r")) !== FALSE) {
        while (($data = fgetcsv($h, $lenth, ",")) !== FALSE) {
            $rahulphpArray[] = $data;
        }
        // Close the file
        fclose($h);
    }
    return $rahulphpArray;
    //var_dump($rahulphpArray);
}