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
                    <h4 class="font-weight-bold border-bottom pb-4">EDIT DATA KANDANG</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif
                <form method="POST" action="data-update/{{ $kandang->id }}">
                    @csrf
                    @method('PUT')
                    {{-- <div class="form-group row ml-3 mr-3">
                        <label for="JumlahAyam" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Ayam</label>
                        <div class="input-group input-group-sm col-sm-9">
                          <input type="number" name="jumlah_ayam" value="{{ $kandang->jmlh_ayam}}" class="form-control form-control-sm {{ $errors->has('jumlah_ayam') ? 'is-invalid' : ''}}"  id="JumlahAyam" placeholder="">
                          <div class="input-group-prepend">
                            <div class="input-group-text">EKOR</div>
                          </div>   
                          @if ($errors->has('jumlah_ayam'))
                                <div class="invalid-feedback">
                                    {{$errors->first('jumlah_ayam')}}
                                </div>
                            @endif
                        </div>
                    </div> --}}
                    <div class="form-group row ml-3 mr-3">
                        <label for="UsiaAyam" class="col-sm-3 col-form-label col-form-label-sm">Usia Ayam</label>
                        <div class="input-group input-group-sm col-sm-9">
                            <input type="number" name="usia_ayam" value="{{ $kandang->usia_ayam}}" class="form-control form-control-sm {{ $errors->has('usia_ayam') ? 'is-invalid' : ''}}" id="UsiaAyam" placeholder="">
                            <div class="input-group-prepend">
                                <div class="input-group-text">MINGGU</div>
                            </div> 
                            @if ($errors->has('usia_ayam'))
                                <div class="invalid-feedback">
                                    {{$errors->first('usia_ayam')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col text-center mt-4 mb-3">
                        <a type="reset" class="justify-content-center btn mb-2 btn-outline-dark mr-2 pr-4 pl-4" href="{{ route('kandang')}}">Batal</a>
                        <button type="submit" class="justify-content-center btn mb-2 btn-outline-dark ml-2 pr-3 pl-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
