@extends('layouts.index')
@section('content')
<div class="data">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }} </h3>
                <a href="{{ route('presensipulang.index') }}" class="btn btn-warning" style="float: right;"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body table table-responsive">
                <table class="table">
                    <tr>
                        <th style="width: 30%;">Nomor Induk Pegawai</th>
                        <th style="width: 20px;">:</th>
                        @if ($result->nip == null)
                        <td> --- </td>
                        @else
                        <td>{{ $result->nip }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th style="width: 30%;">Nama</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $result->nama_guru }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">No Telepon</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $result->no_hp }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Jabatan</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $result->jabatan }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Alamat</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $result->alamat }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Waktu Presensi Pulang</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $result->waktu_presensi }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Foto</th>
                        <th style="width: 20px;">:</th>
                        <td><img src="{{ asset('file/guru/'.$result->foto_guru) }}" alt="" style="width: 100px;"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

</script>
@endsection