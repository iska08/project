@extends('layouts.backend')
@section('title','Admin - Detail Data Customer')
@section('header','Detail Data Customer')
@section('content')
<div class="row">
    <div class="col-sm-10 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Data Harga</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="card-text">
                        <dl class="row">
                            <dt class="col-sm-2">Jenis Pakaian</dt>
                            <dd class="col-sm-10">: {{$harga->jenis}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Lama Pengerjaan</dt>
                            <dd class="col-sm-10">: {{$harga->hari}} hari</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Berat Pakaian</dt>
                            <dd class="col-sm-10">: {{$harga->kg}} Kg</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Harga</dt>
                            <dd class="col-sm-10">: Rp. {{$harga->harga}}</dd>
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