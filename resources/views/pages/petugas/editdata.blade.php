@extends('layouts.layout')
@section('title_nav', 'Profil')
@section('title', 'BRO-QU')

@section('content')

<style>
    input[type=number]::-webkit-inner-spin-button, 
     input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-5 m-auto " style="top: 10vh;">
            <div class="card-body border rounded-lg" style="background-color: white;">
                <div class="card-title text-center mt-2 mb-4">
                    <h4 class="font-weight-bold border-bottom pb-4">EDIT DATA PETUGAS</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif
                <form method="POST" action="data-update/{{ $users->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row ml-3 mr-3">
                        <label for="Nama" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
                        <div class="col-sm-9">
                          <input type="text" name="nama" value="{{ $users->nama_petugas}}" class="form-control form-control-sm {{ $errors->has('nama') ? 'is-invalid' : ''}}"  id="Nama" placeholder="">
                            @if ($errors->has('nama'))
                                <div class="invalid-feedback">
                                    {{$errors->first('nama')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Username" class="col-sm-3 col-form-label col-form-label-sm">Username</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" value="{{ $users->username}}" class="form-control form-control-sm {{ $errors->has('username') ? 'is-invalid' : ''}}" id="Username" placeholder="">
                            @if ($errors->has('username'))
                                <div class="invalid-feedback">
                                    {{$errors->first('username')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Email" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" value="{{ $users->email}}" class="form-control form-control-sm {{ $errors->has('email') ? 'is-invalid' : ''}}" id="Email" placeholder="">
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Alamat" class="col-sm-3 col-form-label col-form-label-sm">Alamat</label>
                        <div class="col-sm-9">
                          <input type="text" name="alamat" value="{{ $users->alamat}}" class="form-control form-control-sm {{ $errors->has('alamat') ? 'is-invalid' : ''}}" id="Alamat" placeholder="">
                            @if ($errors->has('alamat'))
                                <div class="invalid-feedback">
                                    {{$errors->first('alamat')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="NoHP" class="col-sm-3 col-form-label col-form-label-sm">No HP</label>
                        <div class="col-sm-9">
                            <input type="number" name="no_hp" value="{{ $users->no_hp}}" class="form-control form-control-sm {{ $errors->has('no_hp') ? 'is-invalid' : ''}}" id="NoHP" placeholder="">
                             @if ($errors->has('no_hp'))
                                <div class="invalid-feedback">
                                    {{$errors->first('no_hp')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Jabatan" class="col-sm-3 col-form-label col-form-label-sm">Jabatan</label>
                        <div class="col-sm my-0">
                            <select class="custom-select mr-sm-2" name="jabatan" id="Jabatan">
                                @if ($users->jabatan == "Pemilik")
                                    <option selected value="Pemilik">Pemilik</option>
                                    <option value="Pengawas">Pengawas</option>
                                    <option value="Pengelola">Pengelola</option>
                                    @elseif ($users->jabatan == "Pengawas")
                                    <option value="Pemilik">Pemilik</option>
                                    <option selected value="Pengawas">Pengawas</option>
                                    <option value="Pengelola">Pengelola</option>
                                    @else 
                                    <option value="Pemilik">Pemilik</option>
                                    <option value="Pengawas">Pengawas</option>
                                    <option selected value="Pengelola">Pengelola</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col text-center mt-4 mb-3">
                        <a type="reset" class="justify-content-center btn mb-2 btn-outline-dark mr-2 pr-4 pl-4" href="{{ route('petugas')}}">Batal</a>
                        <button type="submit" class="justify-content-center btn mb-2 btn-outline-dark ml-2 pr-3 pl-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
