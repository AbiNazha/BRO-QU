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
                    <h4 class="font-weight-bold border-bottom pb-4">EDIT DATA AYAM</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif
                <form method="POST" action="data-update/{{ $ayam->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row ml-3 mr-3">
                        <label for="NoKandang" class="col-sm-3 col-form-label col-form-label-sm">No Kandang</label>
                        <div class="col-sm my-0">
                            <select class="custom-select mr-sm-2 {{ $errors->has('id_kandang') ? 'is-invalid' : ''}}" name="id_kandang" id="NoKandang">
                                    <option value="{{ $ayam->id_kandang}}">{{ $ayam->id_kandang}}</option>
                            </select>
                            @if ($errors->has('id_kandang'))
                                <div class="invalid-feedback">
                                  {{$errors->first('id_kandang')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="AyamProduktif" class="col-sm-3 col-form-label col-form-label-sm">Ayam Produktif</label>
                        <div class="col-sm-9">
                            <input type="number" name="ayam_produktif" value="{{ $ayam->jmlh_ayam_produktif}}" class="form-control form-control-sm {{ $errors->has('ayam_produktif') ? 'is-invalid' : ''}}" id="AyamProduktif" placeholder="">
                             @if ($errors->has('ayam_produktif'))
                                <div class="invalid-feedback">
                                    {{$errors->first('ayam_produktif')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="AyamBelumProduktif" class="col-sm-3 col-form-label col-form-label-sm">Ayam Belum Produktif</label>
                        <div class="col-sm-9">
                            <input type="number" name="ayam_belum_produktif" value="{{ $ayam->jmlh_ayam_belum_produktif}}" class="form-control form-control-sm {{ $errors->has('ayam_belum_produktif') ? 'is-invalid' : ''}}" id="AyamBelumProduktif" placeholder="">
                             @if ($errors->has('ayam_belum_produktif'))
                                <div class="invalid-feedback">
                                    {{$errors->first('ayam_belum_produktif')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="AyamTidakProduktif" class="col-sm-3 col-form-label col-form-label-sm">Ayam Tidak Produktif</label>
                        <div class="col-sm-9">
                            <input type="number" name="ayam_tidak_produktif" value="{{ $ayam->jmlh_ayam_tidak_produktif}}" class="form-control form-control-sm {{ $errors->has('ayam_tidak_produktif') ? 'is-invalid' : ''}}" id="AyamTidakProduktif" placeholder="">
                             @if ($errors->has('ayam_tidak_produktif'))
                                <div class="invalid-feedback">
                                    {{$errors->first('ayam_tidak_produktif')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="AyamSakit" class="col-sm-3 col-form-label col-form-label-sm">Ayam Sakit</label>
                        <div class="col-sm-9">
                            <input type="number" name="ayam_sakit" value="{{ $ayam->jmlh_ayam_sakit}}" class="form-control form-control-sm {{ $errors->has('ayam_sakit') ? 'is-invalid' : ''}}" id="AyamSakit" placeholder="">
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
                            <input type="number" name="ayam_mati" value="{{ $ayam->jmlh_ayam_mati}}" class="form-control form-control-sm {{ $errors->has('ayam_mati') ? 'is-invalid' : ''}}" id="AyamMati" placeholder="">
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
