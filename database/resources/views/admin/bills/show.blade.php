<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>86mm Bill Receipt - Bill #{{ $bill->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 86mm;
            margin: 0 auto;
            font-size: 12px;
            color: #000;
        }
        .receipt-container {
            padding: 5px;
            border: 1px solid #000;
            background: #f9f9f9;
            border-radius: 5px;
        }
        .text-center { text-align: center; }
        .bold { font-weight: bold; }
        .item-table, .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }
        .item-table th, .item-table td, .summary-table td {
            padding: 2px 0;
            border-bottom: 1px dashed #000;
        }
        .no-border td { border: none; }
        .total-row td { font-weight: bold; }
        .barcode img { max-width: 100%; height: auto; margin-top: 5px; }
        .hidden-print { text-align: center; margin-top: 10px; }
        hr { border: 0; border-top: 1px solid #000; margin: 5px 0; }
        @media print {
            .hidden-print { display: none; }
            body { margin: 0; background: #fff; }
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <!-- Header -->
        <div class="icon-head text-center">
            <a href="javascript:void(0);">
                <img src="{{ asset('assets/images/klogo.jpg') }}" width="100" height="30" alt="Receipt Logo">
            </a>
        </div>
        <div class="text-center info">
            <h6>Karimeen 😊</h6>
            <p class="mb-0">Phone Number: +1 5656665656</p>
            <p class="mb-0">Email: <a href="mailto:support@example.com">restaurantkarimeen@gmail.com</a></p>
        </div>
        <hr>

        <!-- Items Table -->
        <table class="item-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bill->items as $item)
                    <tr>
                        <td>{{ $item->product ? $item->product->name : 'N/A' }}</td>
                        <td>&pound;{{ number_format($item->unit_price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>&pound;{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>

        <!-- Summary -->
        <table class="summary-table">
            <tr>
                <td>Total Qty:</td>
                <td class="text-right">{{ $bill->items->sum('quantity') }}</td>
            </tr>
            <tr>
                <td>Total Amount:</td>
                <td class="text-right">&pound;{{ number_format($bill->total_amount, 2) }}</td>
            </tr>
            <tr>
                <td>Grand Total:</td>
                <td class="text-right">&pound;{{ number_format($bill->total_amount, 2) }}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td class="text-right">{{ $bill->payment_mode ?? 'N/A' }}</td>
            </tr>
        </table>
        <hr>

        <!-- Barcode and Footer -->
        <div class="barcode text-center">
            <img src="{{ asset('reciept/barcode.png') }}" alt="Barcode">
        </div>
        <p class="text-center">Thank You for Shopping!</p>
    </div>

    <!-- Print and Back Buttons -->
    <div class="hidden-print">
        <button onclick="window.print();">Print Bill</button>
        <button onclick="window.history.back();">Back</button>
    </div>
</body>
</html>