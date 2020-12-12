@extends('layouts.layout')
@section('title_nav', 'Profil')
@section('title', 'BRO-QU')

@section('content')

<style>
.dataTables_filter {
   display: none;
}

</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10 m-auto" style="top: 10vh;">
            <div class="card-title text-center mt-2 mb-4">
                <h2 class="font-weight-bold ">DATA PETUGAS</h2>
            </div>
            @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                <strong>Selamat</strong> {{ session()->get('message')}}
            </div>
            @endif
            <div class="card-body border rounded-lg" style="background-color: white; ">
                <div class="navbar navbar-expand-sm">
                    <ul class="navbar-nav float-sm-left" >
                        <input id="searchbox" class="form-control mr-sm-2" type="text" placeholder="Pencarian">
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item pr-3 border-right">
                            <a class="nav-link" href="{{ route('tambahdata')}}" style="color: grey;">Tambah Data</a>
                        </li>
                        <li class="nav-item pl-3">
                            <a class="nav-link" href="#" style="color: grey;">Unduh</a>
                        </li>
                    </ul>
                </div>
                <div class="container-fluid">

                <table id="datatable" class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $d => $data)
                            <tr>
                                <th scope="col">{{$data->id}}</th>
                                <th scope="col">{{$data->nama_petugas}}</th>
                                <th scope="col">{{$data->username}}</th>
                                <th scope="col">{{$data->alamat}}</th>
                                <th scope="col">{{$data->no_hp}}</th>
                                <th scope="col">{{$data->jabatan}}</th>
                            <th scope="col"><a class="text-decoration-none" href="petugas/edit/{{$data->id}}" style="color: grey;">Edit</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    $("document").ready(function(){
        var table = $('#datatable').DataTable({
            "lengthChange": false,
            "ordering": false
        });

        $("#searchbox").keyup(function() {
            table.search($(this).val()).draw() ;
        });  

        setTimeout(function(){
            $("div.alert").remove();
        }, 3000 );
    });
</script>
@endsection
