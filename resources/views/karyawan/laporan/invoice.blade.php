@extends('layouts.backend')
@section('title','Karyawan - Invoice Customer')
@section('header','Invoice Customer')
@section('content')
<div class="col-md-12">
    <div class="card card-body printableArea">
        <h3><strong>INVOICE</strong> <span class="pull-right">{{$data->invoice}}</span></h3>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <address>
                        <h3>
                            <strong class="text-danger">{{$data->nama_cabang}}</strong>
                        </h3>
                        <p class="text-muted m-l-5"> Diterima Oleh <span style="margin-left:20px"> </span>: {{$data->name}}
                            <br/> Alamat <span style="margin-left:70px"> </span>: {{$data->alamat_cabang}}
                            <br/> No. Telp <span style="margin-left:68px"> </span>: {{$data->no_telpc}}
                            </p>
                    </address>
                </div>
                <div class="pull-right text-right">
                    <address>
                        <h3>Detail Order Customer :</h3>
                        <p class="text-muted m-l-30">
                            {{$data->nama}}
                            <br/> {{$data->alamat}}
                            <br/> {{$data->no_telp}}
                        </p>
                        <p class="m-t-30">
                            <strong>Tanggal Masuk :</strong>
                            <em class="fa fa-calendar"></em>
                            {{carbon\carbon::parse($data->tgl_transaksi)->format('d-m-Y')}}
                        </p>
                        <p>
                            <strong>Tanggal Diambil :</strong>
                            <em class="fa fa-calendar"></em>
                            @if ($data->tgl_ambil == "")
                                Belum Diambil
                            @else
                            {{\carbon\carbon::parse($data->tgl_ambil)->format('d-m-Y')}}
                            @endif
                        </p>
                    </address>
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive m-t-20" style="clear: both;">
                    <table class="table table-hover">
                        <caption></caption>
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Jenis Pakaian</th>
                                <th class="text-right">Berat</th>
                                <th class="text-right">Harga</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice as $item)
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>{{$item->jenis}}</td>
                                    <td class="text-right">{{$item->kg}} kg</td>
                                    <td class="text-right">{{Rupiah::getRupiah($item->harga)}} /kg</td>
                                    <td class="text-right">
                                        <input type="hidden" value="{{$hitung = $item->kg * $item->harga}}">
                                        <p style="color:black">{{Rupiah::getRupiah($hitung)}}</p>
                                    </td>
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="pull-right m-t-10 text-right">
                    <p>Total : {{Rupiah::getRupiah($hitung)}}</p>
                    <p>Diskon @if ($item->disc == "")
                        (0 %)
                    @else
                        ({{$item->disc}} %)
                    @endif :  </p>
                    <hr>
                    <h3><strong>Total Bayar :</strong> {{Rupiah::getRupiah($item->harga_akhir)}}</h3>
                </div>
                @endforeach
                <div class="clearfix"></div>
                <hr>
                <div class="text-right">
                    <a href="{{url('pelayanan')}}" class="btn btn-outline btn-danger" style="color:white">Back</a>
                    <a href="{{url('cetak-invoice/'.$item->id. '/print')}}" target="_blank" class="btn btn-success"><em class="fa fa-print"></em> Print</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection