@extends('note.master')
@section('content')

<div class="container">
    <form action="{{ url('notes/'.$note->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control required" id="title" placeholder="title" value="{{ $note->title }}">
            <span class="text-danger">{{ $errors->first('title')}}</span>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Description of note">{{ $note->description }}</textarea>
            <span class="text-danger">{{ $errors->first('description')}}</span>
        </div>

        <div class="mb-3">
            <label for="status">Status:</label>
            <div class="form-check form-check-inline">
                <input type="radio" name="status" value="1" class="form-check-input" {{ $note->status == 1 ? 'checked' : '' }}>
                <label class="form-check-label">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="status" value="0" class="form-check-input" {{ $note->status == 0 ? 'checked' : '' }}>
                <label class="form-check-label">Non-active</label>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

@endsection