@extends('templates.app')
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            @foreach ($genres as $genre)
            <div class="col-lg-4">
                <div class="card">
                    <div class="empty">
                        <p class="empty-title text-primary">{{ $genre->genre }}</p>
                        <form action="{{ route('genre.edit', $genre) }}" method="POST">
                            @csrf
                            @method('GET')
                            <button class="btn btn-primary mb-3">Edit</button>
                        </form>
                        <form action="{{ route('genre.destroy', $genre) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure delete this data?')">Delete</button>
                        </form>
                        </td>

                    </div>
                </div>
            </div>
            @endforeach
            {{-- {{ $genres->links() }} --}}
        </div>
    </div>
</div>
@endsection
