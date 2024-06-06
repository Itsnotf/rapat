@extends('layouts.app')

@section('title', 'Edit Bidang')
@section('desc', ' On this page you can edit a bidang. ')

@section('content')
    <form action="{{ route('bidang.update', $bidang->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Bidang Form</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input value="{{ old('nama', $bidang->nama) }}" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desc" class="col-sm-3 col-form-label">Desc</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('desc') is-invalid @enderror"  name="desc" id="desc"
                                    placeholder="Desc">{{ $bidang->desc }}</textarea>
                                @error('desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
