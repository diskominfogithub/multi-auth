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
            <form action="{{ route('admin.submit_register') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group form-group-default">
                        <label id="username">Username opd</label>
                        <input required type="text" class="form-control" name="username" id="username">
                    </div>

                    <div class="form-group form-group-default">
                        <label id="password">Password opd</label>
                        <input required type="password" class="form-control" name="password" id="password">
                    </div>

                    <select class="form-control" name="id_opd" id="id_opd">
                        @foreach ($opd_belum_pakai as $opd)
                            <option value="{{$opd->id}}">{{ $opd->nama_opd }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Daftarkan user</button>
                </div>
            </form>
        </div>
    </div>
@endsection