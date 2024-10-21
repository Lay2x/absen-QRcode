@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('dataguru.create') }}" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus">Tambah</i></a>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Nomor Induk Pegawai</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Qr code</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_guru }}</td>
                                    @if ($row->nip == null)
                                    <td> --- </td>
                                    @else
                                    <td>{{ $row->nip }}</td>
                                    @endif
                                    <td>{{ $row->jabatan}}</td>
                                    <td>{{ $row->alamat}}</td>
                                    <td>{{ $row->no_hp}}</td>
                                    <td><img src="{{ asset('file/guru/'.$row->foto_guru) }}" alt="{{ $row->nama_guru }}" style="width: 50px; height: 50px;"></td>
                                    <td>
                                        <div class="visible-print text-center">
                                            {!! QrCode::size(100)->generate($row->id_dataguru); !!}
                                            {{-- <p>Scan me to return to the original page.</p> --}}
                                        </div>
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('cetakkartu.show', $row->id_dataguru) }}" class="btn btn-xs btn-dark" target="_blank"><i class="fas fa-print"></i> Cetak Kartu</a> --}}
                                        <a href="{{ route('dataguru.edit', $row->id_dataguru) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit">Edit</i></a>
                                        <form action="{{ route('dataguru.destroy', $row->id_dataguru) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash">Delete</i></button>
                                        </form>
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