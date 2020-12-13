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
                    <h4 class="font-weight-bold border-bottom pb-4">EDIT DATA PAKAN</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif
                <form method="POST" action="data-update/{{ $pakan->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row ml-3 mr-3">
                        <label for="Konsentrat" class="col-sm-3 col-form-label col-form-label-sm">Konsentrat</label>
                        <div class="input-group input-group-sm col-sm-9">
                            <input type="number" name="konsentrat" value="{{ $pakan->jmlh_konsentrat}}" class="form-control form-control-sm {{ $errors->has('konsentrat') ? 'is-invalid' : ''}}" id="Konsentrat" placeholder="">
                            <div class="input-group-prepend">
                                <div class="input-group-text">KG</div>
                            </div>   
                            @if ($errors->has('konsentrat'))
                                <div class="invalid-feedback">
                                    {{$errors->first('konsentrat')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Jagung" class="col-sm-3 col-form-label col-form-label-sm">Jagung</label>
                        <div class="input-group input-group-sm col-sm-9">
                            <input type="number" name="jagung" value="{{ $pakan->jmlh_jagung}}" class="form-control form-control-sm {{ $errors->has('jagung') ? 'is-invalid' : ''}}" id="Jagung" placeholder="">
                            <div class="input-group-prepend">
                                <div class="input-group-text">KG</div>
                            </div>   
                            @if ($errors->has('jagung'))
                                <div class="invalid-feedback">
                                    {{$errors->first('jagung')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Dedek" class="col-sm-3 col-form-label col-form-label-sm">Dedek Padi</label>
                        <div class="input-group input-group-sm col-sm-9">
                            <input type="number" name="dedek" value="{{ $pakan->jmlh_dedek}}" class="form-control form-control-sm {{ $errors->has('dedek') ? 'is-invalid' : ''}}" id="Dedek" placeholder="">
                            <div class="input-group-prepend">
                                <div class="input-group-text">KG</div>
                            </div>   
                            @if ($errors->has('dedek'))
                                <div class="invalid-feedback">
                                    {{$errors->first('dedek')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Status" class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                        <div class="col-sm my-0">
                            <select class="custom-select mr-sm-2" name="status" id="Status">
                                @if ($pakan->status == "Masuk")
                                    <option selected value="Masuk">Masuk</option>
                                    <option value="Keluar">Keluar</option>
                                @else
                                    <option value="Masuk">Masuk</option>
                                    <option selected value="Keluar">Keluar</option>
                                @endif
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
