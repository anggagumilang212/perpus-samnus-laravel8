@extends('layout.layout')
@section('content')

{{-- cdn toastr --}}
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
                        <h4 class="card-title">Data User</h4>
                        <!-- Button trigger modal -->
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-plus"></i>Tambah Data</button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;    
                                    @endphp
                                    @foreach ($user as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->emal}}</td>
                                        <td>{{$item->password}}</td>
                                        <td>
                                            <a href=# data-target="#modalEdit{{ $item->id }}" data-toggle="modal"
                                                class="btn btn-ss btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ asset('admin/delete-user/' . $item->id) }}" button type="button"
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

     
     <!-- Modal Create-->
     <div class="modal fade" id="modalCreate">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Modal title</h5>
                     <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                     </button>
                 </div>
                 <form action="create-user" method="POST">
                    @csrf
                 <div class="modal-body">
                    <label>Email</label>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="masukkan email">
                    </div>
                    <label>Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="masukkan Password">
                    </div>
                   
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                 </div>
                </form>
             </div>
         </div>
     </div>
     <!-- Modal Edit-->
     @foreach ($user as $item)
     <div class="modal fade" id="modalEdit{{ $item->id }}">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Modal title</h5>
                     <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                     </button>
                 </div>
                 <form action="edit-user" method="POST">
                 @csrf
                 <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id"
                    value="{{ $item->id }}">
                    <label>Email</label>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="{{ $item->email }}" placeholder="masukkan email">
                    </div>
                    <label>Password </label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" value="{{ $item->password }}"  placeholder="masukkan password">
                    </div>
                  
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                 </div>
                </form>
             </div>
         </div>
     </div>
     @endforeach
     {{-- toastr js --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <Script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
     @endsection