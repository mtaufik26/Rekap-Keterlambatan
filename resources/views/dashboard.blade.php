@extends('layouts.template')
@section('conten')
        <div class="content-body">
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Perserta Didik</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$siswa}}</h2>
                                    <p class="text-white mb-0">Siswa</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Administrator</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$user}}</h2>
                                    <p class="text-white mb-0">Admin</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Rayon</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$rayon}}</h2>
                                    <p class="text-white mb-0">Guru</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Rombel </h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$rombel}}</h2>
                                    <p class="text-white mb-0">Ruangan</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i ></i></span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Rayon </h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">27</h2>
                                    <p class="text-white mb-0">Ruangan</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i ></i></span>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
@endsection

