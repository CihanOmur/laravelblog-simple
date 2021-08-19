@extends('back.layouts.master')
@section('content')
@section('title','All pages')

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">@yield('title')
                                <span class="float-right">{{$pages->count()}} page found.</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Photograph</th>
                                            <th>Page Title</th>
                                            <th>Transactions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $page)
                                        <tr> 
                                            <td>
                                            <img src="{{$page->image}}" width="200">
                                            </td>
                                            <td>{{$page->title}}</td>
                                            <td>

                                            <a href="{{route('page',$page->slug)}}" title="View" class="btn btn-sm btn-success"> <i class="fa fa-eye"></i> View </a>
                                            <a href="{{route('admin.page.update',$page->id)}}" title="Edit"class="btn btn-sm btn-primary"> <i class="fa fa-pen"></i> Edit </a>
                                            <a href="{{route('admin.page.delete',$page->id)}}" title="Delete" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> Delete </a>
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
        id=$(this)[0].getAttribute('page-id');
        statu=$(this).prop('checked');
        $.get("{{route('admin.switch')}}", {id:id,statu:statu} ,function(data, status){
        console.log(data);
   
  });
    })
  })
</script>
@endsection



