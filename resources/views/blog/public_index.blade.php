@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	@if(!empty($blogs))
		@foreach($blogs as $blog)
			<div class="col-md-4"><span><b>Title</b><span></div>
			<div class="col-md-8">{{$blog->title}}</div>
			
			<div class="clearfix"></div>
			<div class="col-md-4"><span><b>Description</b></span></div>
			<div class="col-md-8">{{$blog->description}}</div>
			<div class="clearfix"></div>
			<div class="col-md-4"><span><b>Created At</b></span></div>
			<div class="col-md-8">{{date('d-m-Y', strtotime($blog->created_at))}}</div>
			<div class="clearfix"></div>
			<div class="col-md-4"></div>
			<div class="col-md-8"><a href="{{url('/blog/'.$blog->id)}}" class="btn btn-xs btn-info view-right">View Blog</a></div>
			<div class="clearfix"></div>
			<hr>
		@endforeach
	@else
		<p>Nothing to show this time :-(. Please come again to view latest blog update.</p>
    @endif
</div>
@endsection