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
    <p>Kami ingin memberitahu bahwa pakaian kamu dengan nomor Inovice <strong>{{$invoice}}</strong> transaksi pada tanggal <strong>{{Carbon\carbon::parse($tgl_transaksi)->format('d-m-Y')}}</strong>, sudah diambil.</p> 
    <p>Waktu Diambil : <strong>{{Carbon\carbon::parse($tgl_ambil)->format('d-m-Y')}}</strong></p>
    <br>
    
    <p>Terima kasih,</p>
    <p>Regrads, Andri Desmana</p>
</body>
</html>