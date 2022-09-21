@extends('layouts.backend')
@section('title','Admin - Detail Data Customer')
@section('header','Detail Data Customer')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Data Admin Cabang</h4>
            </div>
            <br><img style="width: 300px; border: 4px solid white; padding: 4px" src="{{ asset('storage/' . $kry->image) }}" alt="img"><br>
            <div class="card-content">
                <div class="card-body">
                    <div class="card-text">
                        <dl class="row">
                            <dt class="col-sm-2">Nama Admin Cabang</dt>
                            <dd class="col-sm-10">: {{$kry->name}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Email Admin Cabang</dt>
                            <dd class="col-sm-10">: {{$kry->email}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">No. Telepon</dt>
                            <dd class="col-sm-10">: {{$kry->no_telp == 0 ? 'Belum Input' : $kry->no_telp}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Status Admin Cabang</dt>
                            <dd class="col-sm-10">: 
                                @if ($kry->status == 'Active')
                                <span class="label label-success">Aktif</span>
                                @else
                                <span class="label label-danger">Tidak Aktif</span>
                                @endif
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Alamat Admin Cabang</dt>
                            <dd class="col-sm-10">: {{$kry->alamat}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Nama Cabang</dt>
                            <dd class="col-sm-10">: {{$kry->nama_cabang}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Alamat Cabang</dt>
                            <dd class="col-sm-10">: {{$kry->alamat_cabang}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
@endsection