@extends('back.layouts.master')
@section('content')
@section('title','All Categories')


<div class="row">
    <div class="col-md-4">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create New Category</h6>
</div>
<div class="card-body">
    <form method="post" action="{{route('admin.category.create')}}">
        @csrf
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="category" required/>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Add</button>
            </div>
          </form>
      </div>
      </div>
     </div>
<div class="col-md-6">
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
</div>
<div class="card-body">
<div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Number of content in the category</th>
                                            <th>Transactions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr> 
                                           
                                  <td>{{$category->name}}</td>
                                  <td>{{$category->articleCount()}}</td>
                                  <td>
                                 <a href="#" title="View" class="btn btn-sm btn-success"> <i class="fa fa-eye"></i> View </a>
                                <a href="{{route('admin.delete.category',$category->id)}}" title="Delete" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> Delete </a>
                                <a href="" title="edit" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i>Edit</a>
                                </td>

                                        
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
</div>
</div>
</div>


@endsection




