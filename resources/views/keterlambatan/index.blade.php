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
                            <h4 class="card-title">Data Siswa/i</h4>
                            <button  class="btn btn-primary btn-round ml-auto" data-toggle="modal" >
                                <i class="fa fa-plus"></i>
                                <a href="{{ route('rayon.create')}}">Tambah data</a></button>                           
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>rayon</th>
                                        <th>Ps Rayon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($rayons as $rayon)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $rayon->rayon }}</td>
                                        <td>{{ $rayon->user->name }}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Edit</a>
                                            <a href="#modalHapus{{ $rayon->id }}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($rayons as $rayon)
    <div class="modal fade" id="modalEdit{{ $rayon->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data rayon</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="{{route('rayon.update', $rayon->id )}}" method="POST">
                    @csrf
                    @method('Patch')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Rayon</label>
                                <input class="form-control form-white" value="{{ $rayon->rayon }}" placeholder="Rayon" type="text" name="rayon">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">PS Rayon</label>
                                <select class="form-control form-white" value="{{ $rayon->rayon }}" data-placeholder="PS" name="ps_rayons">
                                    <option value="Pilih">Pilih</option>
                                    <option value="PS Cicurug">PS Cicurug</option>
                                    <option value="PS Cicarua">PS Cicarua</option>
                                    <option value="PS Ciawi">PS Ciawi</option>
                                    <option value="PS Cibedug">PS Cibedug</option>
                                    <option value="PS Sukasari">PS Sukasari</option>
                                    <option value="PS Wikrama">PS Wikrama</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="modal fade" id="modalHapus{{ $rayon->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data rayon</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="{{route('rayon.destroy', $rayon->id )}}" method="POST">
                @csrf                   
                @method('DELETE')
                <div class="modal-body">
                    <div class="frome-group">
                        <h5>Apakah Anda Ingin Menghapus Data Ini ?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

</div>
@endsection