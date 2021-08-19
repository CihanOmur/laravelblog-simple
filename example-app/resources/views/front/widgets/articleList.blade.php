@if(count($articles)>0)
@foreach($articles as $article)


<div class="post-preview">


<a href="{{route('single',[$article->getCategory->slug,$article->slug,$article->title] )}}">

<h2 class="post-title">
{{$article->title}}
</h2>
<img src="{{$article->image}}"/>
<h3 class="post-subtitle">
    {{Str::limit($article->content,50)}}
</h3>
</a>
<p class="post-meta"> Category:
<a href="#">{{$article->getCategory->name}}</a> <br>
<span class="float-right">{{$article->created_at}}</span></p> 
</div>
@if (!$loop->last)
<hr>
@endif
@endforeach
{{$articles->links()}}
@else
<div class= "alet alert-secondary">
   <h4>No articles found for this category.</h4>
   </div>
   @endif
