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
                    <h4 class="font-weight-bold border-bottom pb-4">INPUT DATA PEMASUKAN</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif
                <form method="POST" action="{{ route('postdatapemasukan')}}">
                    @csrf
                    <div class="form-group row ml-3 mr-3">
                        <label for="Tanggal" class="col-sm-3 col-form-label col-form-label-sm">Tanggal</label>
                        <div class="col-sm-9">
                          <input class="form-control form-control-sm {{ $errors->has('tanggal') ? 'is-invalid' : ''}}" name="tanggal" type="date" value="" id="Tanggal">
                            @if ($errors->has('tanggal'))
                                <div class="invalid-feedback">
                                    {{$errors->first('tanggal')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="JumlahPemasukan" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Pemasukan</label>
                        <div class="input-group input-group-sm col-sm-9">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>  
                            <input type="number" min='0' name="jumlah_pemasukan" value="" class="form-control form-control-sm {{ $errors->has('jumlah_pemasukan') ? 'is-invalid' : ''}}" id="JumlahPemasukan" placeholder="">
                            @if ($errors->has('jumlah_pemasukan'))
                                <div class="invalid-feedback">
                                    {{$errors->first('jumlah_pemasukan')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="KeteranganPemasukan" class="col-sm-3 col-form-label col-form-label-sm">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" name="keterangan_pemasukan" value="" class="form-control form-control-sm {{ $errors->has('keterangan_pemasukan') ? 'is-invalid' : ''}}" id="KeteranganPemasukan" placeholder="">
                            @if ($errors->has('keterangan_pemasukan'))
                                <div class="invalid-feedback">
                                    {{$errors->first('keterangan_pemasukan')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col text-center mt-4 mb-3">
                        <a type="reset" class="justify-content-center btn mb-2 btn-outline-dark mr-2 pr-4 pl-4" href="{{ route('pemasukan')}}">Batal</a>
                        <button type="submit" class="justify-content-center btn mb-2 btn-outline-dark ml-2 pr-3 pl-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
