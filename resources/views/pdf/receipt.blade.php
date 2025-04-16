<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Rental Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.4;
            color: #333;
            font-size: 13px;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 15px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            padding-bottom: 6px;
            border-bottom: 1px solid #ddd;
        }

        .logo {
            font-size: 18px;
            font-weight: bold;
        }

        .receipt-title {
            font-size: 16px;
            margin: 12px 0;
            text-align: center;
        }

        .info-section {
            margin-bottom: 8px;
        }

        .info-section h3 {
            border-bottom: 1px solid #eee;
            padding-bottom: 3px;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .info-grid {
            display: table;
            width: 100%;
        }

        .info-row {
            display: table-row;
        }

        .info-label {
            display: table-cell;
            font-weight: bold;
            padding: 2px 0;
            width: 40%;
        }

        .info-value {
            display: table-cell;
            padding: 2px 0;
        }

        .vehicle-details {
            margin: 10px 0;
            padding: 8px;
            background-color: #f9f9f9;
            border-radius: 4px;
        }

        .payment-details {
            margin: 10px 0;
            border-top: 1px solid #eee;
            padding-top: 8px;
        }

        .total {
            font-size: 14px;
            font-weight: bold;
            text-align: right;
            margin-top: 6px;
        }

        .footer {
            margin-top: 15px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        .status-confirmed {
            color: green;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">GoRent</div>
            <div>Car Rental Service</div>
        </div>

        <h1 class="receipt-title">RENTAL RECEIPT</h1>

        <div class="info-section">
            <h3>Booking Information</h3>
            <div class="info-grid">
                <div class="info-row">
                    <div class="info-label">Receipt Number:</div>
                    <div class="info-value">REC-{{ $rental->id }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Booking Date:</div>
                    <div class="info-value">{{ $rental->created_at->format('M d, Y h:i A') }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Payment Status:</div>
                    <div class="info-value status-confirmed">{{ ucfirst($rental->payment_status) }}</div>
                </div>
            </div>
        </div>

        <div class="info-section">
            <h3>Customer Information</h3>
            <div class="info-grid">
                <div class="info-row">
                    <div class="info-label">Name:</div>
                    <div class="info-value">{{ $rental->customer_name }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">ID Number (NIK):</div>
                    <div class="info-value">{{ $rental->customer_nik }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Phone Number:</div>
                    <div class="info-value">{{ $rental->customer_phone }}</div>
                </div>
            </div>
        </div>

        <div class="info-section">
            <h3>Rental Details</h3>
            <div class="info-grid">
                <div class="info-row">
                    <div class="info-label">Pickup Date:</div>
                    <div class="info-value">{{ $rental->rental_date->format('M d, Y') }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Return Date:</div>
                    <div class="info-value">{{ $rental->return_date->format('M d, Y') }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Duration:</div>
                    <div class="info-value">{{ $rental->duration }} {{ \Illuminate\Support\Str::plural('day', $rental->duration) }}</div>
                </div>
            </div>
        </div>

        <div class="vehicle-details">
            <h3>Vehicle Information</h3>
            <div class="info-grid">
                <div class="info-row">
                    <div class="info-label">Vehicle:</div>
                    <div class="info-value">{{ $rental->vehicle->brand }} {{ ucfirst($rental->vehicle->type) }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">License Plate:</div>
                    <div class="info-value">{{ $rental->vehicle->no_plat }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Color:</div>
                    <div class="info-value">{{ ucfirst($rental->vehicle->color) }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Year:</div>
                    <div class="info-value">{{ $rental->vehicle->year }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Daily Rate:</div>
                    <div class="info-value">${{ number_format($rental->vehicle->price, 2) }} / day</div>
                </div>
            </div>
        </div>

        <div class="payment-details">
            <h3>Payment Summary</h3>
            <div class="info-grid">
                <div class="info-row">
                    <div class="info-label">Daily Rate:</div>
                    <div class="info-value">${{ number_format($rental->vehicle->price, 2) }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Number of Days:</div>
                    <div class="info-value">{{ $rental->duration }}</div>
                </div>
            </div>
            <div class="total">
                Total Amount: ${{ number_format($rental->total_payment, 2) }}
            </div>
        </div>

        <div class="footer">
            <p>Thank you for choosing GoRent Car Rental Service!</p>
            <p>If you have any questions, please contact our customer service at +999 347-0499</p>
            <p>This receipt was generated on {{ now()->format('M d, Y h:i A') }}</p>
        </div>
    </div>
</body>

</html>