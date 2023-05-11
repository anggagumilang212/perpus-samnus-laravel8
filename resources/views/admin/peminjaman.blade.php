@extends('layout.layout')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Peminjaman</h4>
                         <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalcreate"><i class="fa fa-plus"></i>Tambah Data</button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        
                                        <th>Nama</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                     $no = 1;   
                                    @endphp
                                    @foreach ($peminjaman as $item)
                                        
                                   
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->judul_buku}}</td>
                                        <td>{{$item->tgl_pinjam}}</td>
                                        <td>{{$item->tgl_kembali}}</td>
                                        <td>
                                            <a href=# data-target="#formModalEdit{{ $item->id }}" data-toggle="modal"
                                                class="btn btn-ss btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ asset('admin/delete-peminjaman/' . $item->id) }}" button type="button"
                                                class="btn btn-danger"
                                                onClick="return confirm('Yakin akan menghapus data ini!')"></button><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
  
   <!-- Modal Tambah data -->
   <div class="modal fade" id="Modalcreate">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Modal title</h5>
                   <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                   </button>
               </div>
               <form action="create-peminjaman" method="post">
                @csrf
               <div class="modal-body">
                <div class="form-group">
                    <label>Nama </label>
                    <input type="text" class="form-control" name="nama" placeholder="masukan nama">
                </div>
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" class="form-control" name="judul_buku" placeholder="masukan judul buku">
                </div>
                <div class="form-group">
                    <label>Tanggal Pinjam </label>
                    <input type="date" class="form-control" name="tgl_pinjam" placeholder="masukan tanggal pinjam">
                </div>
                <div class="form-group">
                    <label>Tanggal Kembali </label>
                    <input type="date" class="form-control" name="tgl_kembali" placeholder="masukan tanggal kembali">
                </div>

               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                   <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
            </form>
           </div>
       </div>
   </div>
   {{-- modal edit data --}}
   @foreach ($peminjaman as $item)
       
   
   <div class="modal fade" id="formModalEdit{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="edit-peminjaman" method="post">
             @csrf
            <div class="modal-body">
             <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id"
                value="{{ $item->id }}">
                 <label>Nama </label>
                 <input type="text" class="form-control" name="nama" value="{{$item->nama}}"placeholder="masukan nama">
             </div>
             <div class="form-group">
                 <label>Judul Buku</label>
                 <input type="text" class="form-control" name="judul_buku" value="{{$item->judul_buku}}"placeholder="masukan judul buku">
             </div>
             <div class="form-group">
                 <label>Tanggal Pinjam </label>
                 <input type="date" class="form-control" name="tgl_pinjam"value="{{$item->tgl_pinjam}}" placeholder="masukan tanggal pinjam">
             </div>
             <div class="form-group">
                 <label>Tanggal Kembali </label>
                 <input type="date" class="form-control" name="tgl_kembali"value="{{$item->tgl_kembali}}" placeholder="masukan tanggal kembali">
             </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
         @endforeach
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <Script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endsection