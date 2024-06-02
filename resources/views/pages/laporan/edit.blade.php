@extends('layouts.app')

@section('title', 'Edit Laporan')
@section('desc', ' On this page you can edit a laporan. ')

@section('content')
    <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Form</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="agenda" class="col-sm-3 col-form-label">Rapat</label>
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

                        <div class="form-group row">
                            <label for="kesimpulan" class="col-sm-3 col-form-label">Kesimpulan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('kesimpulan') is-invalid @enderror" name="kesimpulan" id="kesimpulan"
                                    placeholder="Kesimpulan">{{ $laporan->kesimpulan }}</textarea>
                                @error('kesimpulan')
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
