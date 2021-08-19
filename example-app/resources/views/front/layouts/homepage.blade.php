@extends('front.layouts.master')
@section('title')
Homepage
@endsection
@section('content')
<div class="col-md-9 mx-auto">
@include('front.widgets.articleList')
</div>
@include('front.widgets.categoryWidget')
@endsection
              
             