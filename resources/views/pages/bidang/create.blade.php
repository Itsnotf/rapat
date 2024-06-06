@extends('layouts.app')

@section('title', 'Create New Bidang')
@section('desc', ' On this page you can create a new bidang. ')

@section('content')
    <form action="{{ route('bidang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Rapat Form</h4>
                    </div>
                    <input type="file" class="d-none" id="avatar" name="avatar">

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Bidang</label>
                            <div class="col-sm-9">
                                <input value="{{ old('nama') }}" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Bidang">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desc" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc"
                                    placeholder="Deskripsi">{{ old('desc') }}</textarea>
                                @error('desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
