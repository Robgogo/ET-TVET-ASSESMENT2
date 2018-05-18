@extends('layouts.layout')

@section('content')
    <table id="test" class="table table-responsive">
    <thead>
    <tr>
        <td>Sector Code</td>
        <td>Sector Name</td>
        <td>Description</td>
    </tr>
    </thead>

    </table>
@endsection

@section('ajax')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.js"></script>
<script>
    $(function(){
        $('#test').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'http://localhost:13890/summary/testDT',
            columns: [
                {data: 'Sectorcode'},
                {data: 'Sectorname'},
                {data: 'Sectordesc'}
            ]
        });
    });
</script>
@endsection