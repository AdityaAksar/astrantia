@extends('layouts.app')

@section('title', 'Galeri Kegiatan')
@section('description', 'Dokumentasi foto dan momen kebersamaan kelas Astrantia SI A 2023.')

@section('content')
    <main class="pt-40 pb-20 min-h-screen">
        @livewire('gallery-list')
    </main>
@endsection