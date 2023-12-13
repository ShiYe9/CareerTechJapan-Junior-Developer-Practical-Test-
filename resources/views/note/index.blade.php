@extends('note.master')
@section('content')

<div class="container">
  <div class="row">
  <div class="col-md-6">
    <h1 class="ms-5">Notes</h1>
  </div>
  <div class="col-md-6">
    <a href="{{ url('notes/create') }}" class="btn btn-success float-end m-3">+ Add New</a>
  </div>
  
</div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <table class="table table-bordered table-hover p-5">
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($notes as $note)
            <tr>
                <td>{{$note->id}}</td>
                <td>{{$note->title}}</td>
                <td class="data-list">{{$note->description}}</td>
                
                <td>{{ $note->status == 1 ? 'Active' : 'Non-active' }}</td>
                <td>
                    <form action="{{ url('notes/'.$note->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ url('notes/'.$note->id.'/edit') }}" class="btn btn-success btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit 
                        </a>
                        
                        <a href="{{ url('notes/'.$note->id) }}" class="btn btn-info btn-sm">Show Details</a>

                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash">Delete</i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $notes->links() }}  
</div>

@endsection
