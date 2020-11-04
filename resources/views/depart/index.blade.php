@extends('depart.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('depart.create') }}"> Create New department</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>DeptID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($depart as $depart)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $depart->name }}</td>
            <td>{{ $depart->depart_id }}</td>
            <td>
                <form action="{{ route('depart.destroy',$depart->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('depart.show',$depart->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('depart.edit',$depart->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
  
      
@endsection