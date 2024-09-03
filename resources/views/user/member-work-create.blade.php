@extends('layouts.app')

@section('active_mentor_work', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Create Karya Anggota</h3>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('user.member-work.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Photo</label>
                                <input type="file" class="form-control" name="photo" accept="image/*">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Content</label>
                                <textarea name="content" id="editor" cols="30" rows="10" class="form-control" required style="overflow:scroll; max-height:300px"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Nama Anggota</label>
                                <input type="text" class="form-control" name="author" required value="{{ Auth::user()->name }}" readonly>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection