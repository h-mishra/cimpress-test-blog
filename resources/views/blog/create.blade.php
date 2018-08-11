@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <form method="post" action="{{url('/blog/submitBlog')}}">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Blog Title:</label>
			
            <input type="text" class="form-control" name="title"/>
			
			@if ($errors->has('title'))
				<span class="help-block">
					<strong>{{ $errors->first('title') }}</strong>
				</span>
			@endif
			
        </div>
        <div class="form-group">
            <label for="description">Blog Description:</label>
            <textarea cols="5" rows="5" class="form-control" name="description"></textarea>
			
				@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>
				@endif
			
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection