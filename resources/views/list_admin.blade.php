@extends('layout.index')

@section('konten')
<div class="mt-4">
    <div class="card card-default">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
            <h3> Tabel untuk {{ $nama_opd ?? '' }} </h3>
            <div class="table-responsive">
                <table id="table" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Admin</th>
                            <th>OPD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($get_user as $jt)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $jt->username }}</td>
                            <td>{{$jt->getopd->nama_opd}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extendedJs')
<script>
    $(document).ready(function(){
            $("#table").dataTable();
        });
</script>
@endsection