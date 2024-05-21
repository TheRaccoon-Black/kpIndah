@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-auto mx-auto cf-container">
                    <form action="/pinjaman" method="post">
                        @csrf
                        <br>
                        {{-- <div class="session-title row">
							<h2>Tambah Data</h2>
							<p>Silahkan masukan data yang sesuai!!!</p>
						</div> --}}

                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-12">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h3 class="mb-0">Tambah Data Pinjaman</h4>
                                    </div>
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <small class="text-muted float-start">Silahkan masukan data yang
                                            sesuai!!!</small>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 form-label">Tanggal Pinjaman</label>
                                                <div class="col-sm-10">
                                                    <input type="date" placeholder="Enter Tanggal pinjaman"
                                                        class="form-control
                                                            @error('tanggal') is-invalid @enderror"
                                                        value="{{ old('tanggal') }}" id="tanggal"
                                                        name="tanggal">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label"
                                                    for="basic-icon-default-fullname">Pilih pengajuan pinjaman</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                                class="bx bx-user"></i></span>
                                                        <select class="form-select @error('nama') is-invalid @enderror"
                                                            id="pengajuan_id" name="pengajuan_id" aria-label="Nama"
                                                            aria-describedby="basic-icon-default-fullname2">
                                                            <option value="">Pilih pengajuan</option>
                                                                <option selected value="nominal">Wajib</option>
                                                                <option selected value="tipe">Pokok</option>
                                                            </select>
                                                                @foreach ($pengajuan as $p)
                                                                <input type="hidden">
                                                                @endforeach
                                                        </select>
                                                    </div>

                                                    @error('nama')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label"
                                                    for="basic-icon-default-notepad">Total pembayaran <br> (+0.015% bunga)</label>
                                                <div class="col-sm-10">

                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-notepad2" class="input-group-text"><i class="bx bx-dollar"></i></span>
                                                    <input type="number" id="total" class="form-control @error('total') is-invalid @enderror"
                                                        value="{{ old('total') }}" placeholder="Total" aria-label="Total" name="total"
                                                        aria-describedby="basic-icon-default-notepad2">
                                                </div>
                                                @error('total')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                </div>
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                            <div class="row justify-content-end">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Letakkan jQuery sebelum script ini -->
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Tangkap perubahan event di elemen select
        $('#pengajuan_id').change(function() {
            var pengajuan_id = $(this).val();
            console.log("Pengajuan ID: ", pengajuan_id); // Debugging

            var nominal = $('#nominal'+pengajuan_id).val();
            console.log("Nominal: ", nominal); // Debugging

            if(nominal != undefined){
                var bunga = parseInt(nominal) * 0.1;
                var total = parseInt(nominal) + parseInt(bunga);
                $('#total').val(total);
                console.log("Total: ", total); // Debugging
            }else{
                $('#total').val(0);
                console.log("Total: 0"); // Debugging
            }
        });
    });
</script>

                        @endsection
