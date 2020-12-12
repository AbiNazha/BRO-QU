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
                    <h4 class="font-weight-bold border-bottom pb-4">INPUT DATA AYAM</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif
                <form method="POST" action="{{ route('postdataayam')}}">
                    @csrf
                    <div class="form-group row ml-3 mr-3">
                        <label for="AyamAktif" class="col-sm-3 col-form-label col-form-label-sm">Ayam Aktif</label>
                        <div class="col-sm-9">
                            <input type="number" name="ayam_aktif" value="" class="form-control form-control-sm {{ $errors->has('ayam_aktif') ? 'is-invalid' : ''}}" id="AyamAktif" placeholder="">
                             @if ($errors->has('ayam_aktif'))
                                <div class="invalid-feedback">
                                    {{$errors->first('ayam_aktif')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="AyamTidakAktif" class="col-sm-3 col-form-label col-form-label-sm">Ayam Tidak Aktif</label>
                        <div class="col-sm-9">
                            <input type="number" name="ayam_tidak_aktif" value="" class="form-control form-control-sm {{ $errors->has('ayam_tidak_aktif') ? 'is-invalid' : ''}}" id="AyamTidakAktif" placeholder="">
                             @if ($errors->has('ayam_tidak_aktif'))
                                <div class="invalid-feedback">
                                    {{$errors->first('ayam_tidak_aktif')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="AyamSakit" class="col-sm-3 col-form-label col-form-label-sm">Ayam Sakit</label>
                        <div class="col-sm-9">
                            <input type="number" name="ayam_sakit" value="" class="form-control form-control-sm {{ $errors->has('ayam_sakit') ? 'is-invalid' : ''}}" id="AyamSakit" placeholder="">
                             @if ($errors->has('ayam_sakit'))
                                <div class="invalid-feedback">
                                    {{$errors->first('ayam_sakit')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="AyamMati" class="col-sm-3 col-form-label col-form-label-sm">Ayam Mati</label>
                        <div class="col-sm-9">
                            <input type="number" name="ayam_mati" value="" class="form-control form-control-sm {{ $errors->has('ayam_mati') ? 'is-invalid' : ''}}" id="AyamMati" placeholder="">
                             @if ($errors->has('ayam_mati'))
                                <div class="invalid-feedback">
                                    {{$errors->first('ayam_mati')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="col text-center mt-4 mb-3">
                        <a type="reset" class="justify-content-center btn mb-2 btn-outline-dark mr-2 pr-4 pl-4" href="{{ route('ayam')}}">Batal</a>
                        <button type="submit" class="justify-content-center btn mb-2 btn-outline-dark ml-2 pr-3 pl-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
