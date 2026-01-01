@extends('layouts.app')

@section('title', 'Materi Pembelajaran')
@section('description', 'Kumpulan materi kuliah dan bahan ajar untuk mahasiswa Sistem Informasi A 2023.')

@section('content')
    <main class="pt-40 pb-20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @livewire('material-list')
        </div>
    </main>
@endsection