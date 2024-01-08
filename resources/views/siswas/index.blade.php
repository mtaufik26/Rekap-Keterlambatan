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
                                <a href="{{ route('siswa.create')}}">Tambah data</a>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nis</th>
                                        <th>Nama</th>
                                        <th>Rombel</th>
                                        <th>Rayon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->rombel->rombel}}</td>
                                        <td>{{ $siswa->rayon->rayon}}</td>
                                        <td>
                                            <button  class="btn btn-primary btn-round ml-auto" data-toggle="modal" >
                                                <i class="fa fa-edit"></i>
                                                <a href="{{ route('siswa.edit', ['id' => $siswa->id]) }}">Edit</a>
                                            </button>
                                            <button  class="btn btn-primary btn-danger" data-toggle="modal" >
                                                <i class="fa fa-trash"></i>
                                                <a href="#modalHapus{{ $siswa->id }}">Hapus</a>
                                            </button>
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

{{-- <div class="modal fade" id="Create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Rayon</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="{{route('siswa.store')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label">nis</label>
                        <input class="form-control form-white" placeholder="siswa" type="number" name="siswa">
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">nama</label>
                        <input class="form-control form-white" placeholder="siswa" type="text" name="siswa">
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Rayon</label>
                        <input class="form-control form-white" placeholder="siswa" type="text" name="siswa">
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Rombel</label>
                        <input class="form-control form-white" placeholder="siswa" type="text" name="siswa">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Tambah</button>
            </div>
        </form>
        </div>
    </div>
</div> --}}
@foreach ($siswas as $siswa)
    {{-- <div class="modal fade" id="modalEdit{{ $siswa->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data rayon</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="{{route('siswa.update', $siswa->id )}}" method="POST">
                    @csrf
                    @method('Patch')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">nis</label>
                                <input class="form-control form-white" value="{{ $siswa->siswa }}" placeholder="siswa" type="number" name="siswa">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">nama</label>
                                <input class="form-control form-white" value="{{ $siswa->siswa }}" placeholder="siswa" type="text" name="siswa">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Rayon</label>
                                <input class="form-control form-white" value="{{ $siswa->siswa }}" placeholder="siswa" type="text" name="siswa">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Rombel</label>
                                <input class="form-control form-white" value="{{ $siswa->siswa }}" placeholder="siswa" type="text" name="siswa">
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
    </div> --}}

<div class="modal fade" id="modalHapus{{ $siswa->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data rayon</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="{{route('siswa.destroy', $siswa->id )}}" method="POST">
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