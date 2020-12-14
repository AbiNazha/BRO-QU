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
                    <h4 class="font-weight-bold border-bottom pb-4">INPUT DATA TRANSAKSI</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif
                <form method="POST" action="{{ route('postdatatransaksi')}}">
                    @csrf
                    <div class="form-group row ml-3 mr-3">
                        <label for="Jenis" class="col-sm-3 col-form-label col-form-label-sm">Jenis</label>
                        <div class="col-sm my-0">
                            <select class="custom-select mr-sm-2 {{ $errors->has('jenis') ? 'is-invalid' : ''}}" name="jenis" id="Jenis">
                                    <option value="Telur">Telur</option>
                                    <option value="Ayam">Ayam</option>
                            </select>
                            @if ($errors->has('jenis'))
                                <div class="invalid-feedback">
                                    {{$errors->first('jenis')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Jumlah" class="col-sm-3 col-form-label col-form-label-sm">Jumlah</label>
                        <div class="input-group input-group-sm col-sm-9">
                            <input type="number" name="jumlah" value="" class="form-control form-control-sm {{ $errors->has('jumlah') ? 'is-invalid' : ''}}" id="Jumlah" placeholder="">
                            <div class="input-group-prepend">
                                <div class="input-group-text">KG/EKOR</div>
                            </div>  
                            @if ($errors->has('jumlah'))
                                <div class="invalid-feedback">
                                    {{$errors->first('jumlah')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="HargaSatuan" class="col-sm-3 col-form-label col-form-label-sm">Harga Satuan</label>
                        <div class="input-group input-group-sm col-sm-9">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>  
                            <input type="number" name="harga_satuan" value="" class="form-control form-control-sm {{ $errors->has('harga_satuan') ? 'is-invalid' : ''}}" id="HargaSatuan" placeholder="">
                            @if ($errors->has('harga_satuan'))
                                <div class="invalid-feedback">
                                    {{$errors->first('harga_satuan')}}
                                </div>
                             @endif
                        </div>
                    </div>
                    <div class="col text-center mt-4 mb-3">
                        <a type="reset" class="justify-content-center btn mb-2 btn-outline-dark mr-2 pr-4 pl-4" href="{{ route('transaksi')}}">Batal</a>
                        <button type="submit" class="justify-content-center btn mb-2 btn-outline-dark ml-2 pr-3 pl-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
