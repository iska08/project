<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:0px;
            width:100%;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:0px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:100%;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:auto;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <table>
            <caption></caption>
            <thead>
                <tr>
                    <th scope="col">Invoice <strong>{{$data->invoice}}</strong></th>
                    <th scope="col">{{ date('d-M-Y') }}</th>
                </tr>
                <tr>
                    <td style="padding-bottom:80px" colspan="2">
                        <h3 style="color:coral">{{$data->nama_cabang}}</h3>
                        <p class="text-muted m-l-5"> Diterima Oleh <span style="margin-left:8px"> </span>: {{$data->name}}
                            <br/> Alamat <span style="margin-left:62px"> </span>: {{$data->alamat_cabang}}
                            <br/> No. Telp <span style="margin-left:50px"> </span>: {{$data->no_telpc}}
                        </p>
                    </td>
                    <td colspan="3">
                        <h3 style="text-align:right">Detail Order Customer :</h3>
                        <p style="text-align:right">
                            {{$data->nama}}
                            <br/> {{$data->alamat}}
                            <br/> {{$data->no_telp}}
                        </p><br>
                        <p style="text-align:right"><strong>Tanggal Masuk :</b> <em class="fa fa-calendar"></em> {{carbon\carbon::parse($data->tgl_transaksi)->format('d-m-y')}}</p>
                        <p style="text-align:right"><strong>Tanggal Diambil :</b> <em class="fa fa-calendar"></em> 
                            @if ($data->tgl_ambil == "")
                                Belum Diambil
                            @else
                            {{carbon\carbon::parse($data->tgl_ambil)->format('d-m-y')}}
                            @endif
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Pakaian</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                </tr>
                @foreach ($invoice as $item)
                <tr>
                    <td style="color:black">1</td>
                    <td style="color:black">{{$item->jenis}}</td>
                    <td style="color:black">{{$item->kg}} Kg</td>
                    <td style="color:black">{{Rupiah::getRupiah($item->harga)}} /Kg</td>
                    <td><input type="hidden" value="{{$hitung = $item->kg * $item->harga}}">
                        <p style="color:black">{{Rupiah::getRupiah($hitung)}}</p></td>
                </tr>
                @endforeach
                <tr>
                    <th scope="col">Diskon @if ($item->disc == "")
                        0 %
                    @else
                        {{$item->disc}} %
                    @endif </th>
                    <td style="color:black"><input type="hidden" value="{{$disc = ($hitung * $item->disc) / 100}}"> {{Rupiah::getRupiah($disc)}}</td>
                </tr>
                <tr>
                    <th scope="col">Total Bayar</th>
                    <td style="color:black; font-weight:bold">{{Rupiah::getRupiah($item->harga_akhir)}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>