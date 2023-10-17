@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Profil Saya</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">
                                    <a href="#">
                                        {{-- <img class="rounded-circle" alt="User Image" src="{{ $user->gambar }}"> --}}
                                        <img src="{{ asset('backend/img/IMG_20220907_203652_844 - Copy.jpg') }}" width="75" height="75" class="rounded-circle" alt="">
                                    </a>
                                </div>
                                <div class="col ms-md-n2 profile-user-info">
                                    <h4 class="user-name mb-0">{{ auth()->user()->nama_user }}</h4>
                                    <h6 class="text-muted">Web Development</h6>
                                    <div class="user-Location"><i class="fas fa-map-marker-alt mr-2"></i>{{ auth()->user()->alamat }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content profile-tab-cont mt-3">

                            <div class="tab-pane fade show active" id="per_details_tab">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title d-flex justify-content-between">
                                                    <span>Detail Profil</span>
                                                    <hr />
                                                    <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i
                                                            class="far fa-edit me-1"></i>Edit</a>
                                                </h5>
                                                <div class="row">
                                                    <p class="col-sm-7 text-muted text-sm-end mb-0 mb-sm-3">Nama Admin</p>
                                                    <p class="col-sm-3">{{ auth()->user()->nama_user }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-7 text-muted text-sm-end mb-0 mb-sm-3">No. Telpon</p>
                                                    <p class="col-sm-3">{{ auth()->user()->no_telp }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-7 text-muted text-sm-end mb-0 mb-sm-3">Email
                                                    </p>
                                                    <p class="col-sm-3"><a href="/cdn-cgi/l/email-protection"
                                                            class="__cf_email__"
                                                            data-cfemail="a1cbcec9cfc5cec4e1c4d9c0ccd1cdc48fc2cecc">{{ auth()->user()->email }}</a>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-7 text-muted text-sm-end mb-0">Alamat</p>
                                                    <p class="col-sm-3 mb-0">{{ auth()->user()->alamat }}<br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div id="password_tab" class="tab-pane fade">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Change Password</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-lg-6">
                                                <form>
                                                    <div class="form-group">
                                                        <label>Old Password</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Save
                                                        Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
