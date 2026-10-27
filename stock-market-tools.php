<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Begin Head -->

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Stock Market - Calculator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        #investedamount1,
        #investedamount2 {
            text-align: right;
            color: green;
            padding-right: 23px;
            border-top: 1px solid;
            padding-top: 10px;
            font-size: 14px;
        }

        #investedamount1 span,
        #investedamount2 span {
            padding-right: 12px;
            font-size: 11px;
            color: green;
        }

        #result {
            margin-top: 15px;
        }

        #result span {
            padding-right: 12px;
            font-size: 14px;
            color: green;
        }

        .input-group {
            margin-bottom: 10px;
        }

        footer {
            font-size: 10px;
        }

        .loadprice {
            text-align: center;
        }
    </style>
</head>
<!-- End Head -->

<!-- Body -->

<body>
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Calculate Price</h3>
                <div class="card-tools pull-right">
                    <a href="intraday-strategy.php" class="btn btn-sm btn-primary">Intraday Trading Ideas</a>
                </div>
            </div>
            <div class="card-body">
                <p>First Buy</p>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text loader_after">
                                    QTY
                                </span>
                            </div>
                            <input class="form-control" type="number" id="units1" autocomplete="off" onchange="unitChanged('units1','error1')" required />
                        </div>
                        <p><span id='error1'></span></p>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text loader_after">
                                    Rs.
                                </span>
                            </div>
                            <input class="form-control" type="number" id="Price1" autocomplete="off" onchange="unitChanged('Price1','error2')" required />
                        </div>
                        <p><span id='error2'></span></p>
                    </div>
                </div>
                <p>Second Buy</p>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text loader_after">
                                    QTY
                                </span>
                            </div>
                            <input class="form-control" type="number" id="units2" autocomplete="off" onchange="unitChanged('units2','error3')" required />
                            <span id='error3'></span>
                        </div>
                        <p><span id='error3'></span></p>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text loader_after">
                                    Rs.
                                </span>
                            </div>
                            <input class="form-control" type="number" id="Price2" autocomplete="off" onchange="unitChanged('Price2','error4');getAverage()" required>
                        </div>
                        <p><span id='error4'></span></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" onclick="getAverage()"> Calculate Average</button>
                <button class="btn btn-warning" onclick="clearFields()">Clear Fields</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p id="investedamount1"></p>
            </div>
            <div class="col-md-4">
                <p id="investedamount2"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 st">
                <h5 id="result"></h5>
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <h5>Profit Buy/Sell</h5>
        </div>
        <div class="card-body">
            <div class="overlay-wrapper">
                <div class="overlay">
                    <div class="text-bold pt-2"><i class='fa fa-circle-o-notch fa-spin fa-3x'></i></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text loader_after">
                                    Price
                                </span>
                            </div>
                            <input class="form-control loadprice buy" value="1" type="number" name="buy" required />
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text loader_after">
                                    QTY
                                </span>
                            </div>
                            <input class="form-control loadprice buy_qty" value="1" type="number" name="buy_qty" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text loader_after">
                                    Sell
                                </span>
                            </div>
                            <input class="form-control loadprice sell" value="1" type="number" name="sell" required />
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text loader_after">
                                    QTY
                                </span>
                            </div>
                            <input class="form-control loadprice sell_qty" value="1" type="number" name="sell_qty" required />
                        </div>
                    </div>
                </div>
                <div><b id="profit_price"></b></div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            &copy; free to use share or modify. August - 2017. Feedback:praveen_mp@live.com credit go to praveen_mp@live.com</div>
    </footer>
    <script>
        function unitChanged(id, error) {
            if (document.getElementById(id).value != '') {
                document.getElementById(error).innerHTML = '';
                return;
            } else {
                document.getElementById(error).innerHTML = 'Field is Required';
            }
        }

        function getAverage() {

            if (document.getElementById("units1").value == '') {
                document.getElementById("error1").innerHTML = "Units required";
                return;
            } else if (document.getElementById("Price1").value == '') {
                document.getElementById("error2").innerHTML = "Price required";
                return;
            } else if (document.getElementById("units2").value == '') {
                document.getElementById("error3").innerHTML = "Units required";
                return;
            } else if (document.getElementById("Price2").value == '') {
                document.getElementById("error4").innerHTML = "Price required";
                return;
            }

            var unit1 = document.getElementById("units1").value;
            var price1 = document.getElementById("Price1").value;
            var unit2 = document.getElementById("units2").value;
            var price2 = document.getElementById("Price2").value;

            var res1 = (unit1 * price1) + (unit2 * price2);
            var res2 = +unit1 + +unit2;
            var result = res1 / res2;
            document.getElementById("investedamount1").innerHTML = "<span>Amount invested </span> " + unit1 * price1;
            document.getElementById("investedamount2").innerHTML = "<span>Amount invested </span> " + unit2 * price2;
            document.getElementById("result").innerHTML = "<span>Total units </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<bold>" +
                res2 + "</bold><br/><br/><span>Average Price</span> &nbsp;&nbsp;&nbsp;<bold>" + result + "</bold>" +
                "<br/><br/><span>Total Amount</span> &nbsp;&nbsp;&nbsp;<bold>" +
                res1 + "</bold>";
        }

        function clearFields() {
            document.getElementById("units1").value = '';
            document.getElementById("Price1").value = '';
            document.getElementById("units2").value = '';
            document.getElementById("Price2").value = '';
            document.getElementById("result").innerHTML = '';
            document.getElementById("investedamount1").innerHTML = '';
            document.getElementById("investedamount2").innerHTML = '';
        }
    </script>
    <script>
        // function getProfit($buy, $buy_qty, $sell, $sell_qty) {
        //     $total_invest = $buy * $buy_qty;
        //     $total_sell = $sell * $sell_qty;
        //     $profit = $total_sell - $total_invest;
        //     return round($profit);
        // }
        $(document).ready(function() {
            $('.overlay').hide();
            $(document).on('keyup', '.loadprice', function(event) {
                $buy = $('.buy').val();
                $buy_qty = $('.buy_qty').val();
                $sell = $('.sell').val();
                $sell_qty = $('.sell_qty').val();
                $total_invest = $buy * $buy_qty;
                $total_sell = $sell * $sell_qty;
                $profit = $total_sell - $total_invest;
                $profit_percent = ($total_invest / $total_sell) * 100;
                $('#profit_price').text('Rs.' + $profit + '/- Total Profit: ' + $profit_percent + '%');
                // $.ajax({
                //     url: 'model/ajax/wholesale-actions.php',
                //     type: 'post',
                //     data: formValues,
                //     beforeSend: function() {
                //         $('.overlay').show();
                //     },
                //     success: function(response) {
                //         $('.overlay').hide();
                //         $('#generated_report').html(response);

                //     }
                // });
                event.preventDefault();
            });
            // $(document).on('submit', '.report_form', function(event) {
            //     var formValues = $(this).serialize();
            //     $.ajax({
            //         url: 'model/ajax/wholesale-actions.php',
            //         type: 'post',
            //         data: formValues,
            //         beforeSend: function() {
            //             $('.overlay').show();
            //         },
            //         success: function(response) {
            //             $('.overlay').hide();
            //             $('#generated_report').html(response);

            //         }
            //     });
            //     event.preventDefault();
            // });
        });
    </script>
</body>

</html>