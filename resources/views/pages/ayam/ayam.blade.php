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
                <h2 class="font-weight-bold ">DATA AYAM</h2>
            </div>
            @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message')}}
            </div>
            @endif
            <div class="card-body border rounded-lg" style="background-color: white; ">
                <div class="navbar navbar-expand-sm">
                    <ul class="navbar-nav float-sm-left" >
                        <input id="searchbox" class="form-control mr-sm-2" type="text" placeholder="Pencarian">
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @if (Auth::User()->jabatan == "Pengawas" )
                        <li class="nav-item pr-3 border-right">
                            <a class="nav-link" href="{{ route('tambahdataayam')}}" style="color: grey;">Tambah Data</a>
                        </li>
                        @endif
                        {{-- <li class="nav-item pl-3">
                            <a class="nav-link" href="#" style="color: grey;">Unduh</a>
                        </li> --}}
                    </ul>
                </div>
                <div class="container-fluid">

                <table id="datatable" class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Kandang</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Ayam Belum Produktif</th>
                        <th scope="col">Ayam Produktif</th>
                        <th scope="col">Ayam Tidak Profuktif</th>
                        <th scope="col">Ayam Sakit</th>
                        <th scope="col">Ayam Mati</th>
                        <th scope="col">Total Ayam</th>
                        @if (Auth::User()->jabatan == "Pengawas" )
                        <th scope="col">Action</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($ayam as $d => $data)
                            <tr>
                                <th scope="col">{{$data->id}}</th>
                                <th scope="col">{{$data->id_kandang}}</th>
                                <th scope="col">{{$data->tanggal}}</th>
                                <th scope="col">{{$data->jmlh_ayam_produktif}}</th>
                                <th scope="col">{{$data->jmlh_ayam_belum_produktif}}</th>
                                <th scope="col">{{$data->jmlh_ayam_tidak_produktif}}</th>
                                <th scope="col">{{$data->jmlh_ayam_sakit}}</th>
                                <th scope="col">{{$data->jmlh_ayam_mati}}</th>
                                <th scope="col">
                                    <?php $total = $data->jmlh_ayam_produktif + $data->jmlh_ayam_belum_produktif + $data->jmlh_ayam_tidak_produktif + $data->jmlh_ayam_sakit - $data->jmlh_ayam_mati ?>
                                    {{$total}}
                                </th>
                            @if (Auth::User()->jabatan == "Pengawas" )
                            <th scope="col"><a class="text-decoration-none" href="ayam/edit/{{$data->id}}" style="color: grey;">Edit</a></th>
                            @endif
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
