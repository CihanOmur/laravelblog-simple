@extends('back.layouts.master')
@section('content')
@section('title','Settings')



<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">@yield('title') </h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.config.update')}}" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title of the Site</label>
                                            <input type="text" name="title" required class="form-control"  value="{{$config->title}}"/>     
                            </div>
                        </div>
                                       
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Logo of the Site</label>
                        <input type="file"    class="form-control" name="logo" />     
                        </div>
                        </div>



                        <div class="col-md-6">
                         <div class="form-group">
                        <label>Icon of the Site</label>
                        <input type="file"    class="form-control" name="favicon" />     
                         </div>
                        </div>

                   
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Twitter</label>
                        <input type="text"    class="form-control" name="twitter" value="{{$config->twitter}}"/>     
                        </div>
                        </div>


                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Facebook</label>
                        <input type="text"    class="form-control" name="facebook" value="{{$config->facebook}}" />     
                        </div>
                        </div>

                        
                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Github</label>
                        <input type="text"    class="form-control" name="github" value="{{$config->github}}" />     
                        </div>
                        </div>
                    </div>


                    <div class="form-group">
                    <button type="submit" class="btn btn-block btn-md btn-primary">Update</button>
                   </form>
                </div>
             </div>
@endsection



