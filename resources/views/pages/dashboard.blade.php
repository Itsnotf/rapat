@extends('layouts.app')

@section('title', 'Dashboard')
@section('desc', 'Page Dashboard. ')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@section('content')
    <div class="mt-5 row d-flex justify-content-around">
        <a href="/user" style="text-decoration: none" class="card col-sm-5">
            <div class="card-header">
                <div class="card-header-action d-flex justify-content-between w-100">
                    <h4>Total User</h4>
                    <h4 style="color: gray">{{ $totalUser }}</h4>
                </div>
            </div>
        </a>
        <a href="/bidang" style="text-decoration: none" class="card col-sm-5">
            <div class="card-header">
                <div class="card-header-action d-flex justify-content-between w-100">
                    <h4>Total Bidang</h4>
                    <h4 style="color: gray" >{{ $totalBidang }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class=" row d-flex justify-content-around">
        <a href="/rapat" style="text-decoration: none" class="card col-sm-5">
            <div class="card-header">
                <div class="card-header-action d-flex justify-content-between w-100">
                    <h4>Total Rapat</h4>
                    <h4 style="color: gray">{{ $totalRapat }}</h4>
                </div>
            </div>
        </a>
        <a href="/laporan" style="text-decoration: none" class="card col-sm-5">
            <div class="card-header">
                <div class="card-header-action d-flex justify-content-between w-100">
                    <h4>Total Laporan</h4>
                    <h4 style="color: gray">{{ $totalLaporan }}</h4>
                </div>
            </div>
        </a>
    </div>
@endsection
