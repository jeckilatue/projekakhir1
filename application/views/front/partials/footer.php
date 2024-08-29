<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .content {
            padding-bottom: 40px; /* Adjusted space above the footer */
        }

        footer.footer {
            color: #ffc107; /* Yellow text for contrast */
            text-align: center;
            font-size: 0.75rem; /* Smaller font size */
            padding: 10px 0; /* Smaller padding */
            background-color: #333; /* Dark background color */
            position: fixed; /* Make it stick to the bottom */
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="content">
        <!-- Other content goes here -->
    </div>

    <footer class="footer section p-3">
        <div class="text-center">&copy; Mami Vira Foods Copyright <?php echo date("Y"); ?> All rights reserved.</div>
    </footer>

    <script type="text/javascript">
        $('#pay-button').click(function(event) {
            event.preventDefault();
            $(this).attr("disabled", "disabled");

            $.ajax({
                url: '<?= site_url() ?>/snap/token',
                cache: false,

                success: function(data) {
                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                    }

                    snap.pay(data, {
                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
