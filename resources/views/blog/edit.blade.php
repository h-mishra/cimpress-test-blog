@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <form method="post" action="{{url('/blog/update/'.$id)}}" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Blog Title:</label>
            <input type="text" class="form-control" name="title" value={{$blog->title}} />
        </div>
        <div class="form-group">
            <label for="description">Blog Description:</label>
            <textarea cols="5" rows="5" class="form-control" name="description">{{$blog->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    
	</div>
</div>
@endsection