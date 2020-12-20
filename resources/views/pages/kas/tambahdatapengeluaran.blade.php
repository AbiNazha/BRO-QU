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
                    <h4 class="font-weight-bold border-bottom pb-4">INPUT DATA PENGELUARAN</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif
                <form method="POST" action="{{ route('postdatapengeluaran')}}" enctype="multipart/form-data">
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
                        <label for="JumlahPengeluaran" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Pengeluaran</label>
                        <div class="input-group input-group-sm col-sm-9">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>  
                            <input type="number" name="jumlah_pengeluaran" value="" class="form-control form-control-sm {{ $errors->has('jumlah_pengeluaran') ? 'is-invalid' : ''}}" id="JumlahPengeluaran" placeholder="">
                            @if ($errors->has('jumlah_pengeluaran'))
                                <div class="invalid-feedback">
                                    {{$errors->first('jumlah_pengeluaran')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Keterangan" class="col-sm-3 col-form-label col-form-label-sm">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" name="keterangan" value="" class="form-control form-control-sm {{ $errors->has('keterangan') ? 'is-invalid' : ''}}" id="Keterangan" placeholder="">
                            @if ($errors->has('keterangan'))
                                <div class="invalid-feedback">
                                    {{$errors->first('keterangan')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Bukti" class="col-sm-3 col-form-label col-form-label-sm">Bukti</label>
                        <div class="col-sm-9">
                            <input type="file" accept="image/*" name="image" value="" class="form-control form-control-sm {{ $errors->has('image') ? 'is-invalid' : ''}}" id="Bukti" placeholder="">
                            @if ($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{$errors->first('image')}}
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
