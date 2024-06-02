@extends('layouts.app')

@section('title', 'Create New Rapat')
@section('desc', ' On this page you can create a new rapat. ')

@section('content')
    <form action="{{ route('rapat.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="agenda" class="col-sm-3 col-form-label">Agenda</label>
                            <div class="col-sm-9">
                                <input value="{{ old('agenda') }}" type="text"
                                    class="form-control @error('agenda') is-invalid @enderror" name="agenda" id="agenda"
                                    placeholder="Agenda">
                                @error('agenda')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="waktu" class="col-sm-3 col-form-label">Waktu</label>
                            <div class="col-sm-9">
                                <input value="{{ old('waktu') }}" type="time"
                                    class="form-control @error('waktu') is-invalid @enderror" name="waktu" id="waktu"
                                    placeholder="Waktu">
                                @error('waktu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input value="{{ old('tanggal') }}" type="date"
                                    class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                    id="tanggal" placeholder="Tanggal">
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat" class="col-sm-3 col-form-label">Tempat</label>
                            <div class="col-sm-9">
                                <input value="{{ old('tempat') }}" type="text"
                                    class="form-control @error('tempat') is-invalid @enderror" name="tempat" id="tempat"
                                    placeholder="Tempat">
                                @error('tempat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="acara" class="col-sm-3 col-form-label">Acara</label>
                            <div class="col-sm-9">
                                <input value="{{ old('acara') }}" type="text"
                                    class="form-control @error('acara') is-invalid @enderror" name="acara" id="acara"
                                    placeholder="Acara">
                                @error('acara')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dihadiri" class="col-sm-3 col-form-label">Di hadiri</label>
                            <div class="col-sm-9">
                                <input value="{{ old('dihadiri') }}" type="text"
                                    class="form-control @error('dihadiri') is-invalid @enderror" name="dihadiri"
                                    id="dihadiri" placeholder="Di Hadiri">
                                @error('dihadiri')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dipimpin" class="col-sm-3 col-form-label">Di pimpin</label>
                            <div class="col-sm-9">
                                <input value="{{ old('dipimpin') }}" type="text"
                                    class="form-control @error('dipimpin') is-invalid @enderror" name="dipimpin"
                                    id="dipimpin" placeholder="Di Pimpin">
                                @error('dipimpin')
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
