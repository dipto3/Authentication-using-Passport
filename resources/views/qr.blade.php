<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laravel 9 - How to Generate QR Code</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header text-center">
                <h2>SCAN QR CODE TO ACCESS Shoccho</h2>
            </div>
            <div class="card-body text-center">
                {!! QrCode::size(400)->generate('https://play.google.com/store/apps/details?id=com.prefeex.shoccho&hl=en_AU&gl=US') !!}
            </div>
        </div>

    </div>
</body>
</html>