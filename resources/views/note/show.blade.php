@extends('note.master')

@section('content')

<div class="container">
    @if ($note)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $note->title }}</h5>
                <p class="card-text">ID: {{ $note->id }}</p>
                <p class="card-text">Description: {{ $note->description }}</p>
                <p class="card-text">Status: {{ $note->status == 1 ? 'Active' : 'Non-active' }}</p>
                <!-- Other details or actions -->
            </div>
        </div>
    @else
        <p>No note found.</p>
    @endif
</div>

@endsection
