@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>User Data</h5>
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah User
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.user-data.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-12">
                                        <label for="photo" class="form-label">Photo</label>
                                        <input type="file" name="photo" class="form-control m-b-md" id="photo"
                                            aria-describedby="photo" placeholder="Masukkan Nama Lengkap" required
                                            accept="image/*">
                                    </div>
                                    <div class="col-12">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control m-b-md" id="name"
                                            aria-describedby="name" placeholder="Masukkan Nama Lengkap" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="signInEmail" class="form-label">Nomor Induk</label>
                                        <input type="text" name="nim" class="form-control m-b-md" id="nim"
                                            aria-describedby="nim" placeholder="NIM / NIP" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="signInEmail" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control m-b-md" id="email"
                                            aria-describedby="email" placeholder="Masukkan Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="signInEmail" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="birth_date" class="form-control m-b-md" id="birth_date"
                                            aria-describedby="birth_date" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="signInEmail" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="birth_place" class="form-control m-b-md"
                                            id="birth_place" aria-describedby="birth_place"
                                            placeholder="Masukkan Tempat Lahir" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="level" class="form-label">Level Account</label>
                                        <select name="level" class="form-control m-b-md" id="level"
                                            aria-describedby="level" required>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                            <option value="pembina">Pembina</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="signInPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            aria-describedby="password" placeholder="Masukkan Password" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="signInPassword" class="form-label">Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="password_confirmation" aria-describedby="password_confirmation"
                                            placeholder="Masukkan Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-bordered" id="datatable1" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->level }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $user->id }}">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.user-data.update') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                                        <label for="photo" class="form-label">Photo</label>
                                                        <input type="file" name="photo" class="form-control m-b-md"
                                                            id="photo" aria-describedby="photo"
                                                            placeholder="Masukkan Nama Lengkap"
                                                            accept="image/*">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="name" class="form-label">Nama Lengkap</label>
                                                        <input type="text" name="name" class="form-control m-b-md"
                                                            id="name" aria-describedby="name"
                                                            placeholder="Masukkan Nama Lengkap" required
                                                            value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="signInEmail" class="form-label">Nomor Induk</label>
                                                        <input type="text" name="nim" class="form-control m-b-md"
                                                            id="nim" aria-describedby="nim" placeholder="NIM / NIP"
                                                            required value="{{ $user->nim }}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="signInEmail" class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control m-b-md"
                                                            id="email" aria-describedby="email"
                                                            placeholder="Masukkan Email" required
                                                            value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="signInEmail" class="form-label">Tanggal
                                                            Lahir</label>
                                                        <input type="date" name="birth_date" class="form-control m-b-md"
                                                            id="birth_date" aria-describedby="birth_date" required
                                                            value="{{ $user->birth_date }}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="signInEmail" class="form-label">Tempat Lahir</label>
                                                        <input type="text" name="birth_place"
                                                            class="form-control m-b-md" id="birth_place"
                                                            aria-describedby="birth_place"
                                                            placeholder="Masukkan Tempat Lahir" required
                                                            value="{{ $user->birth_place }}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="level" class="form-label">Level Account</label>
                                                        <select name="level" class="form-control m-b-md" id="level"
                                                            aria-describedby="level" required>
                                                            <option value="user" @if ($user->level == 'user') selected @endif>User</option>
                                                            <option value="admin" @if ($user->level == 'admin') selected @endif>Admin</option>
                                                            <option value="pembina" @if ($user->level == 'pembina') selected @endif>Pembina</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="signInPassword" class="form-label">Password</label>
                                                        <input type="password" name="password" class="form-control"
                                                            id="password" aria-describedby="password"
                                                            placeholder="Masukkan Password" >
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="signInPassword" class="form-label">Konfirmasi
                                                            Password</label>
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control" id="password_confirmation"
                                                            aria-describedby="password_confirmation"
                                                            placeholder="Masukkan Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection