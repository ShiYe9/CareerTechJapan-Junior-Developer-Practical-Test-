@extends('note.master')
@section('content')

<div class="container">
    <form action="{{url('notes')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" name="title" class="form-control required" id="" placeholder="title">
            <span class="text-danger">{{ $errors->first('title')}}</span>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="10" type="text" class="form-control" placeholder="description of note"></textarea>
            <span class="text-danger">{{ $errors->first('description')}}</span>
        </div>

        <div class="mb-3">
            <label>Status:</label>
            <div class="form-check form-check-inline">
                <input type="radio" name="status" value="1" class="form-check-input">
                <label class="form-check-label">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="status" value="0" class="form-check-input">
                <label class="form-check-label">Non-active</label>
            </div>
        </div>
        
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

@endsection