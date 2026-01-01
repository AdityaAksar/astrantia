@extends('layouts.app')

@section('title', 'Daftar Tugas')
@section('description', 'Informasi tugas kuliah dan tenggat waktu (deadline) untuk kelas Astrantia.')

@section('content')
    <main class="pt-40 pb-20 min-h-screen"> 
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @livewire('assignment-list')
        </div>
    </main>
@endsection