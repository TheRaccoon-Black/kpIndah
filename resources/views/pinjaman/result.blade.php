@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-auto mx-auto cf-container">
                    <div class="card mb-12">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h3 class="mb-0">Hasil Validasi Gaji dan Pinjaman</h3>
                        </div>
                        <div class="card-body">
                            <p>User: {{ $user->nama }}</p>
                            <p>Gaji: Rp {{ number_format($gaji->gaji, 2) }}</p>
                            <p>Pinjaman: Rp {{ number_format($pinjaman->nominal, 2) }}</p>
                            <p>80% Gaji: Rp {{ number_format($gaji->gaji * 0.8, 2) }}</p>
                            <p>
                                @if ($isGajiGreaterThanPinjaman)
                                    <span class="text-success">80% dari gaji lebih besar dari pinjaman.</span>
                                @else
                                    <span class="text-danger">80% dari gaji tidak lebih besar dari pinjaman.</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
