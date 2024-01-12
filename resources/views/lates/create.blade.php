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
                                    <a href="{{ route('lates.index')}}">Close</a>
                                </button>
                            </div>
                            <div class="content-wrapper">
                                <!-- Content Header (Page header) -->
                                <div class="content-header">
                                  <div class="container-fluid">
                                    <div class="row">
                                      <div class="col-sm-6">
                                      </div><!-- /.col -->
                                    </div><!-- /.row -->
                                  </div><!-- /.container-fluid -->
                                </div>
                                <!-- /.content-header -->
                                <!-- Main content -->
                                <div class="card ">
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ route('lates.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                      <div class="card-body">
                                        <div class="form-group">
                                          
                                            <label>NAMA</label>
                                            <select class="form-control select2 select2-purple @error('student_id') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="student_id"  placeholder="Masukkan Role">
                                              <option value="success">Pilih</option>
                                              @foreach ($lates as $item)
                                              <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                              @endforeach
                                              </select>
                                              @error('student_id')
                                                <div class="alert alert-danger mt-2">
                                                  {{ $message }}
                                                </div>
                                            @enderror
                                            <label>TANGGAL</label>
                                              <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="datetime-local" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask @error('date_time_late') is-invalid @enderror name="date_time_late" value="{{ old('date_time_late') }}" placeholder="YYYY-MM-DD HH:mm">
                                                          {{-- <input type="datetime-local" name="date_time_late" id="date-format" class="form-control" placeholder="YYYY-MM-DDTHH:mm"> --}}
                                                {{-- <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask @error('date_time_late') is-invalid @enderror name="date_time_late" value="{{ old('date_time_late') }}" placeholder="YYYY-MM-DD"> --}}
                                              </div>
                                            <!-- /.form group -->
                                                  
                                          <label>ALASAN</label>
                                            <textarea type="text" class="form-control @error('information') is-invalid @enderror" name="information" value="" placeholder="Masukkan Alasan Keterlambatan">{{ old('information') }}</textarea>
                                              
                                            <!-- error message untuk title -->
                                              @error('name')
                                                <div class="alert alert-danger">
                                                  {{ $message }}
                                                </div>
                                              @enderror
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputFile">Bukti Keterlambatan</label>
                                            <div class="input-group">
                                              <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="bukti">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                  <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                </form>
                              </div>
                            <!-- /.content -->
                          </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
  @endsection
                      