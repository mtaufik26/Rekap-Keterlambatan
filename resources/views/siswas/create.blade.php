@extends('layouts.template')
@section('conten')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Data</h4>
                            <button  class="btn btn-primary btn-round ml-auto" data-toggle="modal" >
                                <i class="fa fa-plus"></i>
                                <a href="{{ route('siswas.index')}}">Close</a></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="POST">
                            <div class="basic-form">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label">Nis</label>
                                    <input type="Number" class="form-control input-default" placeholder="Nis..." id="nis" name="nis">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <input type="text" class="form-control input-flat" placeholder="Nama Lengkap... " id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Rombel</label>
                                    <select class="form-control form-white" name="rombel_id" id="rombel_id">
                                        <option value="success">Pilih</option>
                                        @foreach ($rombels as $item)
                                        <option value="{{ $item->id }}">{{ $item->rombel}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Rayon</label>
                                    <select class="form-control form-white" name="rayon_id" id="rayon_id">
                                        <option value="success">Pilih</option>
                                        @foreach ($rayon as $item)
                                        <option value="{{ $item->id }}">{{ $item->rayon}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary btn-round ml-auto"><i class="fa fa-save"></i>Tambah
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection