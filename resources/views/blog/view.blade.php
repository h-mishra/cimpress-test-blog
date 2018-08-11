@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	@if(!empty($blog))
	<div class="col-md-4"><span><b>Title</b><span></div>
	<div class="col-md-8">{{$blog->title}}</div>
	
	<div class="clearfix"></div>
	<div class="col-md-4"><span><b>Description</b></span></div>
	<div class="col-md-8">{{$blog->description}}</div>
	<div class="clearfix"></div>
	<div class="col-md-4"><span><b>Created At</b></span></div>
	<div class="col-md-8">{{date('d-m-Y', strtotime($blog->created_at))}}</div>
	<div class="clearfix"></div>
	<div class="col-md-4"><span><b>Author</b></span></div>
	<div class="col-md-8">{{$blog->user->name}}</div>
	<div class="clearfix"></div>
	@endif
	 
    
</div>
@endsection