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
                    <h4 class="font-weight-bold border-bottom pb-4">HITUNG PAKAN</h4>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message')}}
                    </div>
                @endif
                <form method="POST" action="{{ route('posthitungpakan')}}">
                    @csrf
                    <div class="form-group row ml-3 mr-3">
                        <label for="NomorKandang" class="col-sm-3 col-form-label col-form-label-sm">Nomor Kandang</label>
                        <div class="col-sm-9">
                            <select class="custom-select mr-sm-2 {{ $errors->has('id_kandang') ? 'is-invalid' : ''}}" name="id_kandang" id="NomorKandang">
                                @foreach ($kandang as $item)
                                    <option value="{{ $item->id}}">{{ $item->id}} ({{ $item->usia_ayam}} Minggu)</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_kandang'))
                                <div class="invalid-feedback">
                                    {{$errors->first('id_kandang')}}
                                </div>
                             @endif
                        </div>
                        <h5></h5>
                    </div>
                    {{-- <div class="form-group row ml-3 mr-3">
                        <label for="JumlahAyam" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Ayam</label>
                        <div class="col-sm-9">
                            <input type="number" name="jumlah_ayam" value="" class="form-control form-control-sm {{ $errors->has('jumlah_ayam') ? 'is-invalid' : ''}}" id="JumlahAyam" placeholder="">
                             @if ($errors->has('jumlah_ayam'))
                                <div class="invalid-feedback">
                                    {{$errors->first('jumlah_ayam')}}
                                </div>
                             @endif
                        </div>
                    </div> --}}
                    <div class="col text-center mt-4 mb-3">
                        <a type="reset" class="justify-content-center btn mb-2 btn-outline-dark mr-2 pr-4 pl-4" href="{{ route('pakan')}}">Batal</a>
                        <button type="submit" class="justify-content-center btn mb-2 btn-outline-dark ml-2 pr-3 pl-3">Hitung</button>
                    </div>
                </form>
            </div>
            @if(Session::has('dedek'))
            <div class="row mb-3 mt-3">
                <div class="col-4"> 
                  <div class="card ">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="align-self-center">
                            <h7>
                                <strong>Dedek</strong>
                            </h7>                            
                          </div>
                          <div class="media-body text-right">
                          <strong class="h5">{{ Session::get('dedek')}} Kg</strong>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-4"> 
                    <div class="card ">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="align-self-center">
                              <h7>
                                  <strong>Konsentrat</strong>
                              </h7>                            
                            </div>
                            <div class="media-body text-right">
                                <strong class="h5">{{ Session::get('konsentrat')}} Kg</strong>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-4"> 
                    <div class="card ">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="align-self-center">
                              <h7>
                                  <strong>Jagung</strong>
                              </h7>                            
                            </div>
                            <div class="media-body text-right">
                                <strong class="h5">{{ Session::get('jagung')}} Kg</strong>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              @endif
        </div>
    </div>
</div>
@endsection
