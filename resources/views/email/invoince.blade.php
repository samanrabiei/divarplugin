<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            color: #007BFF;
        }

        .details {
            margin-bottom: 20px;
        }

        .details p {
            margin: 5px 0;
        }

        .footer {
            text-align: center;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Invoice</h1>
        </div>
        <div class="details">
            <p><strong>Customer Name:</strong> saman</p>
            <p><strong>Invoice Number:</strong> 2342</p>
            <p><strong>Date:</strong> {{ $date }}</p>
            <p><strong>Total Amount:</strong> 1200 تومان</p>
        </div>
        <div class="footer">
            <p>Thank you for your business!</p>
        </div>
    </div>
</body>

</html>
