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
                                    <a href="{{ route('lates.index')}}">Close</a></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('lates.store') }}" method="POST">
                                <div class="basic-form">
                                    @csrf
                                    <div class="form-group">
                                      <label class="control-label">Nama</label>
                                      <select class="form-control form-white" name="student_id" id="student_id">
                                          <option value="success">Pilih</option>
                                          @foreach ($lates as $item)
                                          <option value="{{ $item->id }}">{{ $item->nama}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <label class="m-t-40">Tanggal dan Waktu</label>
                                          <input type="datetime-local" name="date_time_late" id="date-format" class="form-control" placeholder="YYYY-MM-DDTHH:mm">
                                  <div class="form-group">
                                    <label>Informasi</label>
                                    <textarea name="information" class="form-control h-150px" rows="6" id="comment"></textarea>
                                </div>
                                  
                                  <label class="control-label">Bukti</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input nama='bukti' type="file" class="custom-file-input">
                                        <label nama='bukti' class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-primary btn-round ml-auto">
                                            <i class="fa fa-save"></i>Tambah
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