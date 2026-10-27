<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Begin Head -->
<?php include_once 'functions.php'; ?>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Intraday Trading Ideas | Stock Market</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<!-- End Head -->

<!-- Body -->

<body>
    <div class="container-fluid">
        <h1 class="card-title">Stock Market Intraday Trading Ideas</h1>
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Intraday Buy / Sell Recomendation Stocks</h3>
                <div class="card-tools">
                    <a href="stock-market-tools.php" class="btn btn-sm btn-primary">Helpfull Tools for stock market</a>
                </div>
            </div>
            <div class="card-body">
            <h6>Intraday Buy Ideas</h6>
                <?php
                $typesOflens = content('https://docs.google.com/spreadsheets/d/e/2PACX-1vRTwCXrMH8urGeMYx8h8LL2kNIR75zKoGg42Ljok1ZrOdnFMa3TR_RE71lnI3BpXwlI06VJ09PzOhVA/pub?gid=798809396&single=true&output=csv');
                ?>
                <table class="table table-sm table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Stock Name</th>
                            <th class="bg-success">Buy Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rs = '<small style="font-size: 10px;">INR</small>';
                        for ($i = 0; $i < count($typesOflens); $i++) {
                            if ($i > 1 AND !empty($typesOflens[$i][1])) {
                                $buyprice = "";
                                $sellprice = "";
                                if (!empty($typesOflens[$i][1])) {
                                    $buyprice = $rs . round($typesOflens[$i][1]);
                                }
                                if (!empty($typesOflens[$i][3])) {
                                    $sellprice = $rs . round($typesOflens[$i][3]);
                                }

                                echo '<tr>';
                                if ($i > 0) {
                                    echo "<td>" . $i . "</td>";
                                    echo "<td class='text-success'>" . str_replace("NSE:", "", $typesOflens[$i][0]) . "</td>";
                                    echo "<td class='text-success'>" . $buyprice . "</td>";
                                }
                                echo '</tr>';
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
            <h6>Intraday Sell Ideas</h6>
                <table class="table table-sm table-hover" id="example2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Stock Name</th>
                            <th class="bg-success">Sell Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rs = '<small style="font-size: 10px;">INR</small>';
                        for ($i = 0; $i < count($typesOflens); $i++) {
                            if ($i > 1 AND !empty($typesOflens[$i][3])) {
                                $buyprice = "";
                                $sellprice = "";
                                if (!empty($typesOflens[$i][1])) {
                                    $buyprice = $rs . round($typesOflens[$i][1]);
                                }
                                if (!empty($typesOflens[$i][3])) {
                                    $sellprice = $rs . round($typesOflens[$i][3]);
                                }

                                echo '<tr>';
                                if ($i > 0) {
                                    echo "<td>" . $i . "</td>";
                                    echo "<td class='text-danger'>" . str_replace("NSE:", "", $typesOflens[$i][2]) . "</td>";
                                    echo "<td class='text-danger'>" . $sellprice . "</td>";
                                }
                                echo '</tr>';
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
        <p class="">Disclaimer<br><small>All data and information is provided “as is” for informational purposes only, and is not intended for trading purposes or financial, investment, tax, legal, accounting or other advice. Please consult your broker or financial representative to verify pricing before executing any trade. Google is not an investment adviser, financial adviser or a securities broker. None of the data and information constitutes investment advice nor an offering, recommendation or solicitation by Google to buy, sell or hold any security or financial product, and Google makes no representation (and has no opinion) regarding the advisability or suitability of any investment</small></p>
    </div>
    <footer>
        <div class="container">
            &copy; 2023 All Rights Reserved
        </div>
    </footer>
</body>

</html>