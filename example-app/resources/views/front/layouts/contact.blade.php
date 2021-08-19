@extends('front.layouts.master')
@section('title','contact')
@section('content')
                      
<div class="col-md-8">
                         <p>CONTACT US!</p>
                          <form method="POST" action="/contactPost">
                              @csrf
                              @if(session('succes'))
                              <div class="alert alert succes">
                                  {{session('succes')}}
                                </div>
                                @endif
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li> {{$error}}></li>
                                        @endforeach
                                      </ul>
                                      @endif
                        <div class="control-group">
                            <div class="form-group controls">
                                    <label>Name Surname</label>
                                    <input type="text" id="name" class="form-control"  value="{{old('name')}}" placeholder="Enter your name and surname..." name="name" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                             </div>
                                     <div class="control-group">
                                     <div class="form-group floting-label-form-group controls">
                                     <label> Email Adress</label> <br>
                                     <input type="email" class="form-control" value="{{old('email')}}" placeholder="Enter your email..." name="email" required>
                                </div>
                                <div>

                                
                                <div class="control-group">
                                <div class="form-group col-xs-12 floting-label-form-group controls">
                                <label>Subject</label>
                                <select class="form-control" name="topic">
                                <option> information </option>
                                <option>support </option>
                                <option>  general</option>
                                </select>
                                </div>
                                </div>
                                <div class="control-group">
                                <div class="form-group floting-label-form-group controls">
                                <label>Message</label> 
                                <textarea rows="5 "name="message" class="form-control" value="{{old('message')}}"placeholder="Enter your message here..."> </textarea>
                                </div>
                                </div>
                                <br>
                                <div id="succes"></div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
 
 @endsection
   
    
      
        