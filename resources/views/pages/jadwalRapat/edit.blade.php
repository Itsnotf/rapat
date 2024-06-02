@extends('layouts.app')

@section('title', 'Edit Rapat')
@section('desc', ' On this page you can edit a rapat. ')

@section('content')
    <form action="{{ route('rapat.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Rapat Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="agenda" class="col-sm-3 col-form-label">Agenda</label>
                            <div class="col-sm-9">
                                <input value="{{ old('agenda', $item->agenda) }}" type="text"
                                    class="form-control @error('agenda') is-invalid @enderror" name="agenda" id="agenda"
                                    placeholder="Nama">
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
                                <input value="{{ old('waktu', $item->waktu) }}" type="text"
                                    class="form-control @error('waktu') is-invalid @enderror" name="waktu" id="waktu"
                                    placeholder="waktu">
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
                                <input value="{{ old('tanggal', $item->tanggal) }}" type="text"
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
                                <input value="{{ old('tempat', $item->tempat) }}" type="text"
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
                                <input value="{{ old('acara', $item->acara) }}" type="text"
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
                                <input value="{{ old('dihadiri', $item->dihadiri) }}" type="text"
                                    class="form-control @error('dihadiri') is-invalid @enderror" name="dihadiri"
                                    id="dihadiri" placeholder="Dihadiri">
                                @error('dihadiri')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dipimpin" class="col-sm-3 col-form-label">Di Pimpin</label>
                            <div class="col-sm-9">
                                <input value="{{ old('dipimpin', $item->dipimpin) }}" type="text"
                                    class="form-control @error('dipimpin') is-invalid @enderror" name="dipimpin"
                                    id="dipimpin" placeholder="Dipimpin">
                                @error('dipimpin')
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
