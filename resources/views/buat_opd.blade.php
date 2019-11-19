@extends('layout.index')

@section('konten')
    <div class="mt-4">
        @if (session('pesan'))
            <div class="alert alert-info">
                {{ session('pesan') }}
            </div>
        @endif
        
        <div class="card card-default">
            <div class="card-header">
                {{ $title }}
            </div>
            <form action="{{ route('admin.submit_buatopd') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group form-group-default">
                        <label id="nama_opd">Nama opd</label>
                        <input required type="text" class="form-control" name="nama_opd" id="nama_opd">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Tambah OPD</button>
                </div>
            </form>
        </div>
    </div>
@endsection