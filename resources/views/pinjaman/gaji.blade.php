@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-auto mx-auto cf-container">
                    <form action="{{route('gaji.simpan')}}" method="post">
                        @csrf
                        @method('post')
                        <br>
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-12">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h3 class="mb-0">Tambah Data Gaji</h3>
                                    </div>
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <small class="text-muted float-start">Silahkan masukan data yang sesuai!!!</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="user_id">User</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">
                                                    <span id="user-icon" class="input-group-text"><i class="bx bx-user"></i></span>
                                                    <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" aria-label="User" aria-describedby="user-icon">
                                                        <option selected disabled>Pilih User</option>
                                                        @foreach ($users as $usr)
                                                            <option value="{{ $usr->id }}">{{ $usr->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('user_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="gaji">Gaji</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">
                                                    <span id="gaji-icon" class="input-group-text"><i class="bx bx-money"></i></span>
                                                    <input type="number" id="gaji" name="gaji" class="form-control @error('gaji') is-invalid @enderror" placeholder="Enter Gaji" value="{{ old('gaji') }}">
                                                </div>
                                                @error('gaji')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
