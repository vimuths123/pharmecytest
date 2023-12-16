<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Email</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
        <h2>Your Prescription Details</h2>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Drug</th>
                    <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Quantity x Price</th>
                    <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item['name'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        {{ $item['quantity'] ." x $". number_format($item['price'], 2)  }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        ${{ number_format($item['amount'], 2) }}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;"></td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><b>Total</b></td>
                    <td style="border: 1px solid #ddd; padding: 8px;">${{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top: 20px;">Thank you for using our service!</p>
        <p>You can accept or reject prescription <a href="{{ route('prescription.respond', $prescription['id']) }}">here</a>.</p>
    </div>
</body>

</html>