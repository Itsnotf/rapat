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
                                    <option value="">Select Agenda</option>
                                    @foreach ($rapat as $item)
                                        <option value="{{ $item->id }}">{{ $item->agenda }}</option>
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
                            <label for="waktu" class="col-sm-3 col-form-label">Waktu</label>
                            <div class="col-sm-9">
                                <input type="time" class="form-control" name="waktu" id="waktu" placeholder="Waktu" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="acara" class="col-sm-3 col-form-label">Acara</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="acara" id="acara" placeholder="Acara" disabled>
                            </div>
                        </div>

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

                        <div class="form-group custom-file">
                            <label for="notulensi" class="custom-file-label">File Notulensi</label>
                            <input value="{{ old('notulensi') }}" type="file"
                                class="custom-file-input @error('notulensi') is-invalid @enderror" name="notulensi"
                                id="notulensi" placeholder="Notulensi">
                            @error('notulensi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('rapat_id').addEventListener('change', function () {
            var rapatId = this.value;
            if (rapatId) {
                fetch('/detailRapat/' + rapatId)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('waktu').value = data.waktu;
                        document.getElementById('tanggal').value = data.tanggal;
                        document.getElementById('acara').value = data.acara;
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('waktu').value = '';
                document.getElementById('tanggal').value = '';
                document.getElementById('acara').value = '';
            }
        });
    </script>
@endsection
