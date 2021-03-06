@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Menampilkan judul Halaman -->
        <div class="col-md-12">
            <h3 align="center"><strong>Dasbor Admin</strong></h3>
            <h4 align="center"><strong>"Data Pengajuan Peminjaman Yang Telah Disetujui"</strong></h4>
        </div>
    </div>

    <div class="row justify-content-center ">
        <div class="col-md-12 mt-4">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Urutan Meminjam</th>
                        <th scope="col">Peminjam</th>
                        <th scope="col">NIP/NIM Peminjam</th>
                        <th scope="col">Kontak Peminjam</th>
                        <th scope="col">Nama Ruangan</th>
                        <th scope="col">Tanggal Meminjam</th>
                        <th scope="col">Tanggal Pemakaian Ruangan</th>
                        <th scope="col">Waktu Memulai Pemakaian Ruangan</th>
                        <th scope="col">Waktu Selesai Pemakaian Ruangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($peminjaman as $pjm)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$pjm->user_nama}}</td>
                        <td>{{$pjm->user_nomorinduk}}</td>
                        <td>{{$pjm->user_nomorhp}}</td>
                        <td>{{$pjm->ruangan_nama}}</td>
                        <td>{{$pjm->tanggal}}</td>
                        <td>{{$pjm->tanggal_dipinjam}}</td>
                        <td>{{$pjm->waktu_pakai}}</td>
                        <td>{{$pjm->waktu_selesai}}</td>
                        <td>
                            <!-- <a href="" class="badge badge-danger">Batal Setujui !</a> -->
                            <form action="/admin/persetujuan/{{$pjm->id}}" method="post" class="d-inline">
                                @method ('patch')
                                @csrf
                                <button type="submit" style="cursor:pointer" class="badge badge-danger" onclick="return confirm('Anda Yakin Membatalkan Persetujuan Peminjaman ?'); ">Batal Setujui !</button>
                            </form>

                        </td>
                    </tr>

                    @endforeach

                </tbody>

            </table>
        </div>


    </div>
</div>
@endsection