@extends('templates.app')
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            @foreach ($perpustakaans as $perpustakaan)
            <div class="col-lg-4">
                <div class="card">
                    <div class="empty">
                        <div class="empty-img"><img src="./static/illustrations/undraw_quitting_time_dm8t.svg" height="128" alt="">
                        </div>
                        <p class="empty-title">{{ $perpustakaan->judul }}</p>
                        <p class="empty-subtitle text-muted">
                            {{ $perpustakaan->deskripsi }}
                        </p>
                        <p class="empty-subtitle text-muted">
                            {{ $perpustakaan->penulis }}
                        </p>
                        <a href="./." class="btn btn-primary mb-3">
                            Baca Buku
                        </a>

                        <form action="{{ route('perpus.edit', $perpustakaan) }}" method="POST">
                            @csrf
                            @method('GET')
                            <button class="btn btn-primary mb-3">Edit</button>
                        </form>
                        <form action="{{ route('perpus.delete', $perpustakaan) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure delete this data?')">Delete</button>
                        </form>
                        </td>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
