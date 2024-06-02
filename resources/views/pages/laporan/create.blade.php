@extends('layouts.app')

@section('title', 'Create New Laporan')
@section('desc', ' On this page you can create a new laporan. ')

@section('content')
    <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
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
                                <select class="form-control @error('rapat_id') is-invalid @enderror" name="id_rapat"
                                    id="rapat_id">
                                    @foreach ($rapat as $item)
                                        <option name="id_rapat" value="{{ $item->id }}">{{ $item->agenda }}</option>
                                    @endforeach
                                </select>
                                @error('rapat_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="agenda" class="col-sm-3 col-form-label">Agenda</label>
                            <div class="col-sm-9">
                                <input value="{{ $item->agenda }}" type="text"
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
                                <input value="{{ $item->waktu }}" type="time"
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
                                <input value="{{ $item->tanggal }}" type="date"
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
                            <label for="acara" class="col-sm-3 col-form-label">Acara</label>
                            <div class="col-sm-9">
                                <input value="{{ $item->acara }}" type="text"
                                    class="form-control @error('acara') is-invalid @enderror" name="acara" id="acara"
                                    placeholder="Acara">
                                @error('acara')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="kesimpulan" class="col-sm-3 col-form-label">Kesimpulan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('kesimpulan') is-invalid @enderror" name="kesimpulan" id="kesimpulan"
                                    placeholder="Kesimpulan">{{ old('kesimpulan') }}</textarea>
                                @error('kesimpulan')
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
