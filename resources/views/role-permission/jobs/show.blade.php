<!-- resources/views/jobs/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $job->title }}</h1>
        <p class="text-gray-700 mb-4">{{ $job->description }}</p>
        <p class="text-gray-600 mb-6">Deadline: {{ $job->deadline->format('M d, Y') }}</p>

        <form method="POST" action="{{ route('jobs.apply', $job->id) }}">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Apply for this Job
            </button>
        </form>
    </div>
</div>
@endsection
