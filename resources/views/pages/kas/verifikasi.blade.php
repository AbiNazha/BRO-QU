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
                    <h4 class="font-weight-bold border-bottom pb-4">Verifikasi Data</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif

                    <div class="form-group row ml-3 mr-3">
                        <label for="Jagung" class="col-sm-3 col-form-label col-form-label-sm">Tanggal</label>
                        <div class="input-group input-group-sm col-sm-9">
                            <h5>: {{ $pengeluaran->tanggal}}</h5>
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Jagung" class="col-sm-3 col-form-label col-form-label-sm">Total Pengeluaran</label>
                        <div class="input-group input-group-sm col-sm-9">
                            <h5>: {{ $pengeluaran->nominal}}</h5>
                        </div>
                    </div>
                    <div class="form-group row ml-3 mr-3">
                        <label for="Jagung" class="col-sm-3 col-form-label col-form-label-sm">Keterangan</label>
                        <div class="input-group input-group-sm col-sm-9">
                            <h5>: {{ $pengeluaran->keterangan}}</h5>
                        </div>
                    </div>
                    <div class="form-group row  ml-3 mr-3">
                        <label for="Bukti" class="col-sm-3 col-form-label col-form-label-sm">Bukti</label>
                        <div class="mb-3 input-group input-group-sm col-sm-9">
                            <img style="max-width: 400px; max-height: 300px;" src="/images/{{ $pengeluaran['bukti'] }}">
                        </div>
                    </div>
                    <div class="col text-right mt-5 mb-3">
                        <a type="reset" class="float-left justify-content-center btn mb-2 btn-outline-dark mr-2 pr-4 pl-4 " href="{{ route('pengeluaran')}}">Batal</a>
                        <a type="submit" class="justify-content-center btn btn-outline-danger mb-2 mr-2 pr-4 pl-4" href="{{ $pengeluaran->id}}/tolak">Tolak</a>
                        <a type="submit" class="justify-content-center btn btn-outline-success mb-2 ml-2 pr-3 pl-3" href="{{ $pengeluaran->id}}/terima">Terima</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
