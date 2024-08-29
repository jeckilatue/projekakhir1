<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mami Vira Foods</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>public/front/css/style.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light Gray background for the entire page */
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #adb5bd; /* White background for the invoice container */
            border: 1px solid #e0e0e0; /* Light border color */
            border-radius: 12px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
        }
        .invoice-header, .invoice-footer {
            background-color: #adb5bd; /* Professional Dark Blue background */
            color: #000; /* White text color */
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }
        .invoice-header {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .invoice-footer {
            border-top: 1px solid #003366; /* Darker blue for the top border */
            text-align: center;
        }
        .table {
            margin: 20px 0;
        }
        .table th, .table td {
            vertical-align: middle;
            padding: 12px;
            border: 1px solid #dee2e6; /* Light border for table cells */
        }
        .table thead th {
            background-color: #004085; /* Dark Blue for table header */
            color: #ffffff; /* White text */
            text-align: center;
        }
        .table tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9; /* Alternating row color */
        }
        .btn-warning {
            background-color: #ff9800; /* Orange background for buttons */
            border-color: #ff9800; /* Matching border color */
        }
        .btn-warning:hover {
            background-color: #e68900; /* Slightly darker orange on hover */
            border-color: #e68900; /* Matching border color */
        }
        .text-center {
            text-align: center;
        }
        h3, p {
            color: #333; /* Dark color for text */
            margin: 0;
        }
        .invoice-content {
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
        }
        .invoice-content p {
            margin-bottom: 10px;
        }
        .invoice-content h3 {
            margin-bottom: 20px;
            font-size: 20px;
        }
        .invoice-content .table {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container my-3">
        <header class="invoice-header">
            <h1>Mami Vira Foods</h1>
            <div class="text-right">
                <h3>Invoice</h3>
                <p>Order #: <?php echo "#".$order['o_id']; ?></p>
                <p>Date: <?php $cDate = strtotime($order['success-date']); echo date('d-M-Y', $cDate); ?></p>
            </div>
        </header>
        <div class="invoice-content" id="printableArea">
            <div class="row mb-3">
                <div class="col-6">
                    <h3>Billing Information</h3>
                    <p><strong><?php echo $res['name'] ?></strong></p>
                    <p><?php echo $res['email'] ?></p>
                    <p><?php echo $res['address'] ?></p>
                </div>
                <div class="col-6">
                    <h3>Shipping Information</h3>
                    <p><strong><?php echo $order['f_name']." ".$order['l_name']?></strong></p>
                    <p><?php echo $order['address'] ?></p>
                    <p><?php echo $order['email'] ?></p>
                    <p><?php echo $order['phone'] ?></p>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Restaurant</th>
                        <th>Dish</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $res['name']; ?></td>
                        <td><?php echo $order['d_name']; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo 'Rp'.$dish['price']; ?>.000</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td class="font-weight-bold">Total</td>
                        <td class="font-weight-bold"><?php echo 'Rp'.$order['price'] ?>.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="invoice-footer">
            <p>Thank you for your order and for choosing us!</p>
            <p>For terms & conditions, please visit <a href="http://www.mamivirainfo.com" style="color: #ffffff; text-decoration: underline;">www.mamivirainfo.com</a></p>
        </div>
    </div>
    <div class="container text-center my-4">
        <button onclick="printDiv('printableArea')" class="btn btn-sm btn-warning p-2"><i class="fas fa-print"></i> Print Invoice</button>
        <a href="<?php echo base_url().'orders' ?>" class="btn btn-sm btn-warning p-2"><i class="fas fa-angle-left"></i> Back to Orders</a>
    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = `
                <html>
                <head>
                    <title>Print Invoice</title>
                    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
                    <style>
                        body {
                            font-family: 'Helvetica Neue', Arial, sans-serif;
                            margin: 20px;
                            color: #333;
                        }
                        .container {
                            width: 100%;
                            margin: 0;
                            padding: 0;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        ${printContents}
                    </div>
                </body>
                </html>
            `;

            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html>
