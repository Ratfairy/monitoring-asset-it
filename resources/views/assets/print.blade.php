<!DOCTYPE html>
<html>
<head>
    <title>Print QR Asset</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            text-align:center;
            padding:30px;
        }

        .qr-card{
            width:300px;
            border:1px solid #ccc;
            padding:20px;
            margin:auto;
            border-radius:10px;
        }

    </style>

</head>
<body>

<div class="qr-card">

    <h4>{{ $asset->kode_asset }}</h4>

    <p>{{ $asset->nama_perangkat }}</p>

    <div style="margin:20px 0;">

        {!! QrCode::size(200)->generate(route('assets.public-show', $asset->id)) !!}

    </div>

    <p>{{ $asset->jenis_perangkat }}</p>

</div>

<script>

    window.onload = function() {

        window.print();

    }

</script>

</body>
</html>