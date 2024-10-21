@extends('layouts.index')
@section('content')
    <?php 
        $title = 'Home';
    ?>
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$dataguru}}</h3>
            <p>Data Guru</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="{{route('dataguru.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$presensihadir}}<sup style="font-size: 20px"></sup></h3>
            <p>Daftar Presensi Hadir Guru</p>
          </div>
          <div class="icon">
            <i class="fas fa-print"></i>
          </div>
          <a href="{{ route('presensihadir.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$presensipulang}}<sup style="font-size: 20px"></sup></h3>
            <p>Daftar Presensi Pulang Guru</p>
          </div>
          <div class="icon">
            <i class="fas fa-print"></i>
          </div>
          <a href="{{ route('presensipulang.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
      <!-- ./col -->   

    {{-- <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Data Admin
                    </h5>
                </div>
                <div class="card-body table table-responsive">
                    <table class="table table-bordered" id="example4">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Data User
                    </h5>
                </div>
                <div class="card-body table table-responsive">
                    <table class="table table-bordered" id="example5">
                        <thead>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Hp</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
@endsection