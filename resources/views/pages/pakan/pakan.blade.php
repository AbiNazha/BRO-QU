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
                <h2 class="font-weight-bold ">DATA STOK PAKAN</h2>
            </div>
            <div class="row mb-3">
                <div class="col-xl-3 col-sm-6 col-12"> 
                  <div class="card shadow">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="align-self-center">
                            <h4>Total Konsentrat</h4>                            
                          </div>
                          <div class="media-body text-right">
                          <h3>
                            {{$konsentrat}} <strong class="h4">Kg</strong>
                          </h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12"> 
                    <div class="card shadow">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="align-self-center">
                              <h4>Total Jagung</h4>                            
                            </div>
                            <div class="media-body text-right">
                            <h3>
                                {{$jagung}} <strong class="h4">Kg</strong>
                            </h3>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12"> 
                    <div class="card shadow">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="align-self-center">
                              <h4>Total Dedek</h4>                            
                            </div>
                            <div class="media-body text-right">
                            <h3>
                                {{$dedek}} <strong class="h4">Kg</strong>
                            </h3>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
                            <a class="nav-link" href="{{ route('tambahdatapakan')}}" style="color: grey;">Tambah Data</a>
                        </li>
                        @endif
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
                        <th scope="col">Tanggal</th>
                        <th scope="col">Konsentrat (KG)</th>
                        <th scope="col">Jagung (KG)</th>
                        <th scope="col">Dedek Padi (KG)</th>
                        <th scope="col">Status</th>
                        @if (Auth::User()->jabatan == "Pengawas" )
                        <th scope="col">Action</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pakan as $d => $data)
                            <tr>
                                <th scope="col">{{$data->id}}</th>
                                <th scope="col">{{$data->tanggal}}</th>
                                <th scope="col">{{$data->jmlh_konsentrat}}</th>
                                <th scope="col">{{$data->jmlh_jagung}}</th>
                                <th scope="col">{{$data->jmlh_dedek}}</th>
                                <th scope="col">{{$data->status}}</th>
                            @if (Auth::User()->jabatan == "Pengawas" )
                                <th scope="col"><a class="text-decoration-none" href="pakan/edit/{{$data->id}}" style="color: grey;">Edit</a></th>
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
