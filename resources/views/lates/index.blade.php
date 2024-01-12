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
                @foreach ($isLates as $late)
                    <button  class="btn external-event bg-success text-white " data-toggle="modal" >
                        <i class="fa fa-plus"></i>
                        <a href="{{ route('lates.detail', ['id' => $late->student_id]) }}">Rekapitulasi Data</a>
                    </button>
                @endforeach
                <div class="card">
                    <div class="card-header">
                      
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Siswa/i</h4>

                            <button  class="btn btn-primary btn-round ml-auto" data-toggle="modal" >
                                <i class="fa fa-plus"></i>
                                <a href="{{ route('lates.create')}}">Tambah data</a>
                            </button>
                          </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Info</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($lates as $siswa)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        {{-- <td>{{ $siswa->student_id }}</td> --}}
                                        <td>{{ $siswa->siswa->nis}}<br>{{ $siswa->siswa->nama}}</td>
                                        <td>{{ $siswa->date_time_late }}</td>
                                        <td>{{ $siswa->information}}</td>
                                        {{-- <td>{{ $siswa->bukti}}</td> --}}
                                        <td>
                                            <button  class="btn btn-primary btn-round ml-auto" data-toggle="modal" >
                                                <i class="fa fa-edit"></i>
                                                <a href="{{ route('lates.edit', ['id' => $siswa->id]) }}">Edit</a>
                                            </button>
                                            <button  class="btn btn-primary btn-danger" data-toggle="modal"  href="#modalHapus{{ $siswa->id }}">
                                                <i class="fa fa-trash"></i>
                                                <a>Hapus</a>
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

{{-- <div class="modal fade" id="modalHapus{{ $siswa->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
</div> --}}
{{-- @endforeach --}}

</div>
@endsection