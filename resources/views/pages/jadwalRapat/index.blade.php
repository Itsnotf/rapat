@extends('layouts.app')

@section('title', 'Manage Rapat')
@section('desc', ' On this page you can manage rapat. ')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Rapat List</h4>
            <div class="card-header-action">
                <a href="{{ route('rapat.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                    Add New
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped w-100" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Agenda</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                            <th>Acara</th>
                            <th>Di Hadiri</th>
                            <th>Di Pimpin</th>
                            <th>Opsi</th>
                            {{-- <th>Status</th> --}}
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            var datatable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: "{!! url()->current() !!}"
                },
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'ALL']
                ],
                responsive: true,
                order: [
                    [0, 'desc'],
                ],
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'agenda',
                        name: 'agenda'
                    },
                    {
                        data: 'waktu',
                        name: 'waktu'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'tempat',
                        name: 'tempat'
                    },
                    {
                        data: 'acara',
                        name: 'acara'
                    },
                    {
                        data: 'dihadiri',
                        name: 'dihadiri'
                    },
                    {
                        data: 'dipimpin',
                        name: 'dipimpin'
                    },
                    {
                        data: 'opsi',
                        name: 'opsi'
                    },
                    // {data: 'status', name: 'status'},
                ],
                columnDefs: [{
                    "targets": 8,
                    "render": function(data, type, row, meta) {
                        let editUrl = `{{ url('/rapat') }}/${row.id}/edit`;
                        let deleteUrl = `{{ url('/rapat') }}/${row.id}`;
                        let opsiUpdate = `{{ url('/updateOpsi') }}/${row.id}`;
                        return `
        ${data}
        <div class="d-flex justify-content-around">
            <form action="${deleteUrl}" method="POST" class="table-links">
                @method('DELETE')
                @csrf
                <button type="submit" class="text-danger btn-delete btn btn-sm">
                    Delete
                </button>
            </form>

            <form action="${opsiUpdate}" method="POST" class="table-links">
                @method('PUT')
                @csrf
                <input type="hidden" name="opsi" value="Disetujui">
                <button type="submit" class="text-success  btn btn-sm">
                    Setujui
                </button>
            </form>

            <form action="${opsiUpdate}" method="POST" class="table-links">
                @method('PUT')
                @csrf
                <input type="hidden" name="opsi" value="Ditolak">
                <button type="submit" class="text-warning  btn btn-sm">
                    Tolak
                </button>
            </form>
        </div>
    `;
                    }

                }],


                rowId: function(a) {
                    return a;
                },
                rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                },
            });
        });
    </script>
@endpush()
