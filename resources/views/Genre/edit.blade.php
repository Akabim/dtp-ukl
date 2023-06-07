@extends('templates.app')
@section('content')
<div class="col-md-6">
    <form class="card" action='{{route('genre.update', $genres->id)}}' method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-header w-full">
            <h3 class="card-title w-full">Basic form</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label required">Judul</label>
                <div>
                    <input type="text" value="{{ $genres->judul }}" name='judul' class="form-control" aria-describedby="emailHelp" placeholder="Masukkan judul buku">
                    <small class="form-hint">We'll never share your email with anyone else.</small>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label required">Deskripsi</label>
                <div>
                    <input type="text" value="{{ $genres->deskripsi }}" name='deskripsi' class="form-control" placeholder="Masukkan deskripsi">
                    <small class="form-hint">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                        spaces, special characters, or emoji.
                    </small>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" name='simpan' class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
