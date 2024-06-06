@extends('layouts.app')

@can('admin')
@section('title', 'Manage Bidang')
@section('desc', ' On this page you can manage bidang. ')
@endcan

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Bidang List</h4>
            <div class="card-header-action">
                @can('admin')
                <a href="{{ route('bidang.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                    Buat Bidang
                </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped w-100" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>descripsi</th>
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
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'desc',
                        name: 'desc'
                    },
                ],

                columnDefs: [{
                    "targets": 2,
                    "render": function(data, type, row, meta) {
                        let deleteUrl = `{{ url('/bidang') }}/${row.id}`;
                        return `
        ${data}
        @can('admin')
        <div class="d-flex justify-content-around">
            <form action="${deleteUrl}" method="POST" class="table-links">
                @method('DELETE')
                @csrf
                <a href="{{ url('/bidang') }}/${row.id}/edit" class="btn btn-sm"> Edit </a>
                <button type="submit" class="text-danger btn-delete btn btn-sm">
                    Delete
                </button>
            </form>
        @endcan
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
