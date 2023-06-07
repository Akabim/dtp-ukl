@extends('templates.app')
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            @foreach ($perpustakaans as $perpustakaan)
            <div class="col-lg-4">
                <div class="card">
                    <div class="empty">
                        <div class="mb-2"><img src="{{ asset('storage/' . $perpustakaan->photo) }}" width="300px" alt="">
                        </div>
                        <p class="empty-title">{{ $perpustakaan->judul }}</p>
                        <p class="empty-subtitle text-primary">
                            {{ $perpustakaan->genre->genre }}
                        </p>
                        <p class="empty-subtitle text-muted">
                            {{ $perpustakaan->deskripsi }}
                        </p>
                        <p class="empty-subtitle text-muted">
                            {{ $perpustakaan->penulis }}
                        </p>
                        <a href="{{ asset('storage/') . '/' . $perpustakaan->buku }}" download="{{ $perpustakaan->judul}}.pdf" class="btn btn-purple mb-3">
                            Baca Buku
                        </a>
                        <form action="{{ route('perpustakaan.edit', $perpustakaan->id) }}" method="POST">
                            @csrf
                            @method('GET')
                            <button class="btn btn-primary mb-3">Edit</button>
                        </form>
                        <form action="{{ route('perpustakaan.destroy', $perpustakaan->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure delete this data?')">Delete</button>
                        </form>
                        </td>

                    </div>
                </div>
            </div>
            @endforeach
            {{ $perpustakaans->links() }}
        </div>
    </div>
</div>
@endsection
