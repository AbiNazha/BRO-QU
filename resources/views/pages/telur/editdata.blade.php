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
                    <h4 class="font-weight-bold border-bottom pb-4">EDIT DATA TELUR</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif
                <form method="POST" action="data-update/{{ $telur->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row ml-3 mr-3">
                        <label for="TelurTerjual" class="col-sm-3 col-form-label col-form-label-sm">Telur Terjual</label>
                        <div class="col-sm-9">
                            <input type="number" name="telur_terjual" value="{{ $telur->jmlh_telurjual}}" class="form-control form-control-sm {{ $errors->has('telur_terjual') ? 'is-invalid' : ''}}" id="TelurTerjual" placeholder="">
                             @if ($errors->has('telur_terjual'))
                                <div class="invalid-feedback">
                                    {{$errors->first('telur_terjual')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="TelurRusak" class="col-sm-3 col-form-label col-form-label-sm">Telur Rusak</label>
                        <div class="col-sm-9">
                            <input type="number" name="telur_rusak" value="{{ $telur->jmlh_telurrusak}}" class="form-control form-control-sm {{ $errors->has('telur_rusak') ? 'is-invalid' : ''}}" id="TelurRusak" placeholder="">
                             @if ($errors->has('telur_rusak'))
                                <div class="invalid-feedback">
                                    {{$errors->first('telur_rusak')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="StokTelur" class="col-sm-3 col-form-label col-form-label-sm">Stok Telur</label>
                        <div class="col-sm-9">
                            <input type="number" name="stok_telur" value="{{ $telur->stok_telur}}" class="form-control form-control-sm {{ $errors->has('stok_telur') ? 'is-invalid' : ''}}" id="StokTelur" placeholder="">
                             @if ($errors->has('stok_telur'))
                                <div class="invalid-feedback">
                                    {{$errors->first('stok_telur')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="col text-center mt-4 mb-3">
                        <a type="reset" class="justify-content-center btn mb-2 btn-outline-dark mr-2 pr-4 pl-4" href="{{ route('telur')}}">Batal</a>
                        <button type="submit" class="justify-content-center btn mb-2 btn-outline-dark ml-2 pr-3 pl-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
