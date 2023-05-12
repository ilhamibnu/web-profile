@extends('admin.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">Datatable</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Table Post</h4>
                        </div>
                        <div class="card-body">
                            <div class="align-right text-right">
                                <button data-toggle="modal" data-target="#addModal" type="button"
                                    class="btn mb-1 btn-rounded btn-outline-primary btn-sm ms-auto">Add</button>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                    </button>

                                    <?php
                                    
                                    $nomer = 1;
                                    
                                    ?>

                                    @foreach ($errors->all() as $error)
                                        <li>{{ $nomer++ }}. {{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{ $no = 1 }};
                                        @foreach ($user as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <img class="rounded-circle"
                                                        src="{{ asset('admin/foto/user/' . $data['image']) }}"
                                                        height="40" width="40" alt="">
                                                </td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->phone }}</td>
                                                <td>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-square btn-outline-success"
                                                            data-toggle="modal"
                                                            data-target="#detailModal{{ $data->id }}">Detail</button>
                                                        <button type="button" class="btn btn-square btn-outline-danger"
                                                            data-toggle="modal"
                                                            data-target="#hapusModal{{ $data->id }}">Delete</button>
                                                        <button type="button" class="btn btn-square btn-outline-warning"
                                                            data-toggle="modal"
                                                            data-target="#editModal{{ $data->id }}">Edit</button>
                                                    </div>
                                                </td>

                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade bd-example-modal-lg"
                                                id="detailModal{{ $data->id }}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Modal</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Tag</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" value="{{ $data->tag }}"
                                                                            class="form-control" placeholder="Tag">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Desc</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" cols="30" rows="5">{{ $data->desc }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Address</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" cols="30" rows="5">{{ $data->address }}</textarea>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="hapusModal{{ $data->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Modal Delete</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/user-delete/{{ $data->id }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="modal-body">

                                                                Anda Yakin Akan Menghapus Data {{ $data->name }} ?

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-secondary">Delete</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade bd-example-modal-lg"
                                                id="editModal{{ $data->id }}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Modal</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/user-update/{{ $data->id }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Image</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" name="image"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="name"
                                                                            value="{{ $data->name }}"
                                                                            class="form-control" placeholder="Name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="email"
                                                                            value="{{ $data->email }}"
                                                                            class="form-control" placeholder="Email">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Phone</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="phone"
                                                                            value="{{ $data->phone }}"
                                                                            class="form-control" placeholder="Phone">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Tag</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="tag"
                                                                            value="{{ $data->tag }}"
                                                                            class="form-control" placeholder="Tag">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Desc</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea name="desc" class="form-control" cols="30" rows="5">{{ $data->desc }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Address</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea name="address" class="form-control" cols="30" rows="5">{{ $data->address }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Password</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" name="password"
                                                                            value="" class="form-control"
                                                                            placeholder="Password">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-2 col-form-label">Repassword</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" name="repassword"
                                                                            value="" class="form-control"
                                                                            placeholder="Re-Password">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary"
                                                                    type="submit">Save</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                </table>
                            </div>
                            <div class="modal fade bd-example-modal-lg" id="addModal">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Modal</h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="/user-add" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="modal-body">

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="email" class="form-control"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="phone" class="form-control"
                                                            placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tag</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="tag" class="form-control"
                                                            placeholder="Tag">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Desc</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="desc" class="form-control" cols="30" rows="5"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="address" class="form-control" cols="30" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="password" value=""
                                                            class="form-control" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Repassword</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="repassword" value=""
                                                            class="form-control" placeholder="Re-Password">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="submit">Save</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @if (Session::get('update'))
        <script>
            swal("Done", "Data Berhasil Diupdate", "success");
        </script>
    @endif
    @if (Session::get('delete'))
        <script>
            swal("Done", "Data Berhasil Dihapus", "success");
        </script>
    @endif
    @if (Session::get('create'))
        <script>
            swal("Done", "Data Berhasil Ditambahkan", "success");
        </script>
    @endif
    @if (Session::get('gagal'))
        <script>
            swal("Gagal Hapus", "Data Masih Terelasi", "error");
        </script>
    @endif

    @if (Session::get('loginberhasil'))
        <script>
            swal("Well Done", "Anda Berhasil Login", "success");
        </script>
    @endif

    @if (Session::get('updateprofil'))
        <script>
            swal("Well Done", "Password Berhasil Diperbarui", "success");
        </script>
    @endif

    @if (Session::get('updateprofilerror'))
        <script>
            swal("Opps!!", "Password Anda Salah", "error");
        </script>
    @endif

    @if (Session::get('passwordtidaksama'))
        <script>
            swal("Opps!!", "Konfirmasi Password Anda Salah", "error");
        </script>
    @endif

    @if (Session::get('sudahlogin'))
        <script>
            swal("Notice", "Anda Masih Login", "success");
        </script>
    @endif
@endsection
