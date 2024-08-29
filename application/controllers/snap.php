<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pembayaran</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="YOUR_CLIENT_KEY"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2>Proses Pembayaran</h2>
        <p>Silakan tunggu, Anda akan diarahkan ke halaman pembayaran Midtrans...</p>
        <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
    </div>

    <script>
        document.getElementById('pay-button').onclick = function() {
            snap.pay('<?php echo $snapToken; ?>', {
                onSuccess: function(result) {
                    // Handle success transaction
                    console.log(result);
                    alert('Pembayaran berhasil! ' + result.status_message);
                },
                onPending: function(result) {
                    // Handle pending transaction
                    console.log(result);
                    alert('Pembayaran tertunda. ' + result.status_message);
                },
                onError: function(result) {
                    // Handle error transaction
                    console.log(result);
                    alert('Pembayaran gagal. ' + result.status_message);
                }
            });
        };
    </script>
</body>
</html>
