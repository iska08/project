@extends('layouts.backend')
@section('title','Form Edit Data Karyawan')
@section('header','Edit Karyawan')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="card-title">Form Edit Data Customer</h4>
        </div>
        <div class="card-body">
            <form action="{{route('customer.update', $edit->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-body">
                  <div class="row">
                    <div class="col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <div class="position-relative">
                                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" value="{{$edit->nama}}">
                                @error('nama')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="email-id-icon">Email</label>
                            <div class="position-relative">
                                <input type="email" name="email_customer" id="email-id-icon" class="form-control @error('email_customer') is-invalid @enderror" placeholder="Email" value="{{$edit->email_customer}}">
                                @error('email_customer')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="no-telp">No. Telepon</label>
                            <div class="position-relative">
                                <input type="number" name="no_telp" id="no-telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{$edit->no_telp}}">
                                @error('no_telp')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-12">
                        <div class="form-group">
                            <label for="alamat">Alamat Customer</label>
                            <div class="position-relative">
                                <textarea type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3"> {{$edit->alamat}} </textarea>
                                @error('alamat')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-12">
                        <div class="form-group">
                            <label for="kelamin">Jenis Kelamin</label>
                            <div class="position-relative">
                                <select name="kelamin" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{$edit->kelamin == 'L' ? 'selected' :''}} >Laki-laki</option>
                                    <option value="P" {{$edit->kelamin == 'P' ? 'selected' :''}}>Perempuan</option>
                                </select>
                                @error('kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"> Update</button>
                    <a href="{{route('customer.index')}}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection