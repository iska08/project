<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Test</title>
</head>
<body>
    <p>Halo, {{$customer}} </p>
    <p>Terima Kasih sudah menggunakan layanan Laundry kami, berikut ini nomor <strong>Inovice</b> kamu.</p>
    <p>Kamu bisa mengecek status pakaian setiap saat pada website kami.</p>
    <p>Nomor Invoice : <strong>{{$invoice}}</b></p>
    <p>Customer : <strong>{{$customer}}</b> </p>
    <p>Tgl Transaksi : <strong>{{Carbon\carbon::parse($tgl_transaksi)->format('d-m-Y')}}</b></p>
    <br><br><br>
    Regrads, Andri Desmana
</body>
</html>