@extends('layouts.app')

@section('content')
<div class="container">
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
   
    <div class="row">
       <a href="{{url('/create/blog')}}" class="btn btn-success">Create Blog</a>
      
    </div>
	
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Title</td>
              <td>Description</td>
              <td>Created At</td>
              <td>Created By</td>
              <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{$blog->id}}</td>
                <td>{{$blog->title}}</td>
                <td>{{$blog->description}}</td>
                <td>{{date('d-m-Y', strtotime($blog->created_at))}}</td>
                <td>{{$blog->user->name}}</td>
				<td>
				<a href="{{url('/blog/view/'.$blog->id)}}" class="btn btn-info">View</a>
				</td>
                <td>
				@if($blog->created_by == auth()->user()->id)
				<a href="{{url('/blog/edit/'.$blog->id)}}" class="btn btn-primary">Edit</a>
				@endif
				</td>
				<td>
					@if(auth()->user()->role_name == 'admin')
                    <form action="{{url('/blog/destroy/'.$blog->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
					@endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection