@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',$article->image)
@section('content')

                    <div class="col-md-10 col-lg-9 ">

                        {!!$article->content!!}
<br/>
<br/>
                        <span class="text-red"> Read Rate: <b>{{$article->hit}}</b></span>
                    </div>
                
    
    
                    @include('front.widgets.categoryWidget')
    @endsection
               