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
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                <i class="fa fa-plus"></i>
                                Tambah Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Rombel</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($rombels as $rombel)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $rombel->rombel }}</td>
                                        <td>
                                            <button  class="btn btn-primary btn-round ml-auto" data-toggle="modal" >
                                                <i class="fa fa-edit"></i>
                                                <a href="#modalEdit{{ $rombel->id }}">Edit</a>
                                            </button>
                                            <button  class="btn btn-primary btn-danger" data-toggle="modal" >
                                                <i class="fa fa-trash"></i>
                                                <a href="#modalHapus{{ $rombel->id }}"></a>Hapus
                                            </button>
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

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Siswa/i</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="{{route('rombel.store')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="frome-group">
                    <label>Rombel</label>
                    <input type="text" class="form-control" name="rombel" placeholder="Rombel..." required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Tambah</button>
            </div>
        </form>
        </div>
    </div>
</div>
@foreach ($rombels as $rombel)
    <div class="modal fade" id="modalEdit{{ $rombel->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Rombel</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="{{route('rombel.update', $rombel->id )}}" method="POST">
                    @csrf
                    @method('Patch')
                    <div class="modal-body">
                        <div class="frome-group">
                            <label>Rombel</label>
                            <input type="text" value="{{ $rombel->rombel }}" class="form-control" name="rombel" placeholder="Rombel..." required>
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

<div class="modal fade" id="modalHapus{{ $rombel->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Rombel</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="{{route('rombel.destroy', $rombel->id )}}" method="POST">
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