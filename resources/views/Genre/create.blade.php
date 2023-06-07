@extends('templates.app')
@section('content')
<div class="col-md-6">
    <form class="card" action='{{route('perpustakaan.store')}}' method='post' enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <h3 class="card-title">Basic form</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label required">Judul</label>
                <div>
                    <input type="text" name='judul' class="form-control" aria-describedby="emailHelp" placeholder="Masukkan judul buku">
                    <small class="form-hint">We'll never share your email with anyone else.</small>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label required">Deskripsi</label>
                <div>
                    <input type="text" name='deskripsi' class="form-control" placeholder="Masukkan deskripsi">
                    <small class="form-hint">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                        spaces, special characters, or emoji.
                    </small>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label required">Penulis</label>
                <div>
                    <input type="text" name='penulis' class="form-control" placeholder="Masukkan nama penulis">
                    <small class="form-hint">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                        spaces, special characters, or emoji.
                    </small>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label required">Genre</label>
                <div>
                    <select name="genre_id" id="" class="form-control">
                        @foreach($genres as $gen)
                        <option value="{{ $gen->id }}">{{ $gen->genre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label required">Upload Cover Buku</label>
                <div>
                    <input type="file" name='photo' class="form-control" placeholder="Upload cover buku">
                    <small class="form-hint">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                        spaces, special characters, or emoji.
                    </small>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label required">Upload FIle Buku</label>
                <div>
                    <input type="file" name='buku' class="form-control" placeholder="Upload cover buku">
                    <small class="form-hint">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                        spaces, special characters, or emoji.
                    </small>
                </div>
            </div>
            {{-- <div class="mb-3">
                <label class="form-label">Select</label>
                <div>
                    <select class="form-select">
                        <option>Option 1</option>
                        <optgroup label="Optgroup 1">
                            <option>Option 1</option>
                            <option>Option 2</option>
                        </optgroup>
                        <option>Option 2</option>
                        <optgroup label="Optgroup 2">
                            <option>Option 1</option>
                            <option>Option 2</option>
                        </optgroup>
                        <optgroup label="Optgroup 3">
                            <option>Option 1</option>
                            <option>Option 2</option>
                        </optgroup>
                        <option>Option 3</option>
                        <option>Option 4</option>
                    </select>
                </div>
            </div> --}}
        </div>
        <div class="card-footer text-end">
            <button type="submit" name='simpan' class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
</h2>
</x-slot>
<div class="container mx-auto pt-10">
    <div class="w-full px-4">
        <form action='{{route('perpus.store')}}' method='post' enctype='multipart/form-data'>
            @csrf
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan judul</label>
                <input type="text" id='judul' name="judul" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan deskripsi</label>
                <input type="text" id="deskripsi" name='deskripsi' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan penulis</label>
                <input type="text" id="penulis" name='penulis' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <button type="submit" name='simpan' class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload Buku</button>
        </form>
    </div>
</div>


</x-app-layout> --}}
