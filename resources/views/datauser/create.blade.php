@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto cf-container">
                    <form action="/user" method="post">
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
                                            <h3 class="mb-0">Tambah Data User</h4>
                                        </div>
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <small class="text-muted float-start">Silahkan masukan data yang
                                                sesuai!!!</small>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-fullname">Nama</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-fullname2"
                                                                class="input-group-text"><i class="bx bx-user"></i></span>
                                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                               value="{{ old('nama') }}" id="nama" placeholder="Nama" name="nama"
                                                                aria-label="Nama"
                                                                aria-describedby="basic-icon-default-fullname2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-notepad">Nip</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-notepad2"
                                                                class="input-group-text"><i
                                                                    class="bx bx-buildings"></i></span>
                                                            <input type="number" id="nip"
                                                                class="form-control @error('nip') is-invalid @enderror"
                                                                value="{{ old('nip') }}" placeholder="NIP" aria-label="NIP."
                                                                name="nip" aria-describedby="basic-icon-default-notepad2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-email">Email</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i
                                                                    class="bx bx-envelope"></i></span>
                                                            <input type="text" id="email" name="email"
                                                                class="form-control @error('email') is-invalid
                                                                @enderror" value="{{ old('email') }}" placeholder="email" aria-label="email"
                                                                aria-describedby="basic-icon-default-email2" />
                                                            <span id="basic-icon-default-email2"
                                                                class="input-group-text">@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="row mb-3">
                                                    <label class="col-sm-2 form-label">Photo</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control @error('avatar') is-invalid
                                                        @enderror" value="{{ old('avatar') }}" name="avatar" id="customFile" />
                                                    </div>
                                                </div> --}}
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">No
                                                        Handphone</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                                    class="bx bx-phone"></i></span>
                                                            <input type="text" id="basic-icon-default-phone"
                                                                class="form-control phone-mask @error('no_hp') is-invalid @enderror"
                                                                value="{{ old('no_hp') }}" id="no_hp" name="no_hp"
                                                                placeholder="658 799 8941" aria-label="658 799 8941"
                                                                aria-describedby="basic-icon-default-phone2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 form-label"
                                                        for="basic-icon-default-address">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-address"
                                                                class="input-group-text"><i
                                                                    class="bx bx-comment"></i></span>
                                                            <textarea id="basic-icon-default-message" class="form-control @error('alamat') is-invalid @enderror"
                                                            value="{{ old('alamat') }}" id="alamat" name="alamat" placeholder="Silahkan masukkan alamat lengkap anda"
                                                                aria-label="Silahkan masukkan alamat lengkap anda" aria-describedby="basic-icon-default-message2"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-2 form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-10">
                                                        <div class="d-flex">
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" class="form-check-input"
                                                                    name="jenis_kelamin" id="jk" value="L">
                                                                <label class="form-check-label"
                                                                    for="inlineRadio1">Laki-Laki</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jenis_kelamin" id="jk" value="P">
                                                                <label class="form-check-label"
                                                                    for="inlineRadio2">Perempuan</label>
                                                            </div>
                                                            @error('jenis_kelamin')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 form-label">Tanggal Masuk</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" placeholder="Enter Tanggal Masuk"
                                                            class="form-control
                                                            @error('tanggal_masuk') is-invalid @enderror"
                                                            value="{{ old('tanggal_masuk') }}" id="tanggal_masuk"
                                                            name="tanggal_masuk">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Role</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role"
                                                                    aria-label="role" aria-describedby="basic-icon-default-fullname2">
                                                                <option value="anggota">Anggota</option>
                                                                <option value="admin">Admin</option>
                                                                <option value="kepala_koperasi">Kepala Sekolah</option>
                                                            </select>
                                                        </div>
                                                        @error('role')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-fullname">Password</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-fullname2"
                                                                class="input-group-text"><i class="bx bx-user"></i></span>
                                                            <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                                                value="{{ old('password') }}" id="password" name="password"
                                                                placeholder="Password"
                                                                aria-label="Password"
                                                                aria-describedby="basic-icon-default-fullname2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-fullname">Password Konfirmasi</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-fullname2"
                                                                class="input-group-text"><i class="bx bx-user"></i></span>
                                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                                            value="{{ old('password_confirmation') }}" id="password_confirmation" name="password_confirmation"
                                                            placeholder="Password Konfirmasi"
                                                                aria-label="Password Konfirmasi"
                                                                aria-describedby="basic-icon-default-fullname2" />
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                        @endsection
