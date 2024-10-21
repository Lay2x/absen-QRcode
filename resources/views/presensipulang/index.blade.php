@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('presensipulang.create') }}" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-list"> Absen Sekarang</i></a>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <table class="table table-bordered" id="example1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nomor Induk Pegawai</th>
                                <th scope="col">Nama Guru</th>
                                <th scope="col">Status Kepulangan</th>
                                <th scope="col">Waktu Presensi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($row->nip == null)
                                    <td> --- </td>
                                    @else
                                    <td>{{ $row->nip }}</td>
                                    @endif
                                    <td>{{ $row->nama_guru }}</td>
                                    <td>{{ $row->status_kepulangan }}</td>
                                    <td>{{ $row->waktu_presensi_hari}} {{ $row->waktu_presensi_jam }}</td>
                                    <td>
                                        {{-- <a href="{{ route('dataguru.edit', $row->id_dataguru) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit">Edit</i></a> --}}
                                        <a href="{{ route('presensipulang.show', $row->id_pulang) }}" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i> Detail</a>
                                        {{-- <form action="{{ route('presensihadir.destroy', $row->id_hadir) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash">Delete</i></button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection