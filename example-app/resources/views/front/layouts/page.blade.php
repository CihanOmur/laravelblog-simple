@extends('front.layouts.master')
@section('title',$page->title)
@section('bg',$page->image)
@section('content')
<main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                <li>
                {!!$page->content!!}
</li>
                   
                   
                    </div>
                </div>
            </div>
        </main>
        @endsection
        <!-- Bootstrap core JS-->
        <script src=""></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    
