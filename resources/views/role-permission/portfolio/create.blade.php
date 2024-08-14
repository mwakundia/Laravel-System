<!-- resources/views/portfolio/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-4">Create Portfolio</h1>
    <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('portfolio.form')
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
    </form>
</div>
@endsection
