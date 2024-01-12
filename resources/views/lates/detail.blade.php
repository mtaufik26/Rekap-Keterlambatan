
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
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <div class="mt-4">
                                    <h2 class="text-2xl font-bold mb-4">{{ $keterlambatanSiswa->first()->siswa->name }} - Detail Keterlambatan</h2>
                                
                                    <div class="bg-gray-200 p-4 rounded-lg">
                                        <h3 class="text-lg font-semibold mb-2">Informasi Siswa</h3>
                                        <p>Nama Siswa: {{ $keterlambatanSiswa->first()->siswa->nama }}</p>
                                        <p>NIS: {{ $keterlambatanSiswa->first()->siswa->nis }}</p>
                                        <p>Rayon: {{ $keterlambatanSiswa->first()->siswa->rayon->rayon }}</p>
                                        <p>Rombel: {{ $keterlambatanSiswa->first()->siswa->rombel->rombel }}</p>
                                    </div>
                                
                                    @foreach ($keterlambatanSiswa as $index => $keterlambatan)
                                        <div class="bg-white p-4 mb-4 rounded-lg">
                                            <h3 class="text-lg font-semibold mb-2">Keterlambatan ke -{{ $index + 1 }}</h3>
                                            <p>Tanggal Terlambat: {{ $keterlambatan->created_at->formatLocalized('%d %B %Y') }}</p>
                                            <p>Informasi Terlambat: {{ $keterlambatan->information }}</p>
                                            <img src="{{ asset('storage/bukti/' . $keterlambatan->bukti) }}" alt="Bukti Terlambat" class="mt-2 max-w-full w-64 h-auto">

                                        </div>
                                    @endforeach
                                
                                    <!-- Informasi Siswa di Bagian Atas -->
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection