@extends('back.layouts.master')
@section('content')
@section('title','All Articles')

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">@yield('title')
                                <span class="float-right">{{$articles->count()}} article found.</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Photograph</th>
                                            <th>Article Title</th>
                                            <th>Category</th>
                                            <th>Views</th>
                                            <th>Creation Date</th>
                                            <th>Case</th>
                                            <th>Transactions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $article)
                                        <tr> 
                                            <td>
                                                <img src="{{$article->image}}" width="200">
                                            </td>
                                            <td>{{$article->title}}</td>
                                            <td>{{$article->getCategory->name}}</td>
                                            <td>{{$article->hit}}</td>
                                            <td>{{$article->created_at->diffForHumans()}}</td>
                                            <td>
                                            <input  class="switch" data="{{$article->id}}" type="checkbox"   data-on="Active" data-off="Passive"  data-onstyle="success" data-offstyle="danger" @if($article->status==1)checked @endif checked data-toggle="toggle">
                                            </td>
                                            <td>

                                            <a href="#" title="View" class="btn btn-sm btn-success"> <i class="fa fa-eye"></i> View </a>
                                            <a href="{{route('admin.articles.edit',$article->id)}}" title="Edit"class="btn btn-sm btn-primary"> <i class="fa fa-pen"></i> Edit </a>
                                            <a href="{{route('admin.delete.article',$article->id)}}" title="Delete" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> Delete </a>
                                            
                                            </td>
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@endsection
@section('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>

  $(function() {
    $('.switch').change(function() {
        id=$(this)[0].getAttribute('article-id');
        statu=$(this).prop('checked');
        $.get("{{route('admin.switch')}}", {id:id,statu:statu} ,function(data, status){
        console.log(data);
   
  });
    })
  })
</script>
@endsection



