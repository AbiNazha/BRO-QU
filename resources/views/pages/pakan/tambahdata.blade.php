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
                    <h4 class="font-weight-bold border-bottom pb-4">INPUT DATA PAKAN</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif
                <form method="POST" action="{{ route('postdatapakan')}}">
                    @csrf
                    <div class="form-group row ml-3 mr-3">
                        <label for="Konsentrat" class="col-sm-3 col-form-label col-form-label-sm">Konsentrat</label>
                        <div class="col-sm-9">
                            <input type="number" name="konsentrat" value="" class="form-control form-control-sm {{ $errors->has('konsentrat') ? 'is-invalid' : ''}}" id="Konsentrat" placeholder="">
                             @if ($errors->has('konsentrat'))
                                <div class="invalid-feedback">
                                    {{$errors->first('konsentrat')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Jagung" class="col-sm-3 col-form-label col-form-label-sm">Jagung</label>
                        <div class="col-sm-9">
                            <input type="number" name="jagung" value="" class="form-control form-control-sm {{ $errors->has('jagung') ? 'is-invalid' : ''}}" id="Jagung" placeholder="">
                             @if ($errors->has('jagung'))
                                <div class="invalid-feedback">
                                    {{$errors->first('jagung')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Dedek" class="col-sm-3 col-form-label col-form-label-sm">Dedek Padi</label>
                        <div class="col-sm-9">
                            <input type="number" name="dedek" value="" class="form-control form-control-sm {{ $errors->has('dedek') ? 'is-invalid' : ''}}" id="Dedek" placeholder="">
                             @if ($errors->has('dedek'))
                                <div class="invalid-feedback">
                                    {{$errors->first('dedek')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Ayam" class="col-sm-3 col-form-label col-form-label-sm">Ayam</label>
                        <div class="col-sm-9">
                            <input type="number" name="ayam" value="" class="form-control form-control-sm {{ $errors->has('ayam') ? 'is-invalid' : ''}}" id="Ayam" placeholder="">
                             @if ($errors->has('ayam'))
                                <div class="invalid-feedback">
                                    {{$errors->first('ayam')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="UsiaAyam" class="col-sm-3 col-form-label col-form-label-sm">Usia Ayam</label>
                        <div class="col-sm-9">
                            <input type="number" name="usia_ayam" value="" class="form-control form-control-sm {{ $errors->has('usia_ayam') ? 'is-invalid' : ''}}" id="UsiaAyam" placeholder="">
                             @if ($errors->has('usia_ayam'))
                                <div class="invalid-feedback">
                                    {{$errors->first('usia_ayam')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Status" class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                        <div class="col-sm my-0">
                            <select class="custom-select mr-sm-2" name="status" id="Status">
                                <option value="Masuk">Masuk</option>
                                <option value="Keluar">Keluar</option>
                            </select>
                        </div>
                    </div>
                    <div class="col text-center mt-4 mb-3">
                        <a type="reset" class="justify-content-center btn mb-2 btn-outline-dark mr-2 pr-4 pl-4" href="{{ route('pakan')}}">Batal</a>
                        <button type="submit" class="justify-content-center btn mb-2 btn-outline-dark ml-2 pr-3 pl-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
