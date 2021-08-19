    
    @isset($categories)

    <div class="col-md-3">
    <div class="card">   
                <div class="card-header">
              </div>
                CATEGORY
               </div>
                <div class="list-group">
                @foreach($categories as $category)  
               <li class="list-group-item ">
              <a @if(Request::segment(2)!=$category->slug) href="{{route('category',$category->slug)}}"> @endif> {{$category->name}}</a>
               <span class="badge bg-dark  float-right">{{$category->articleCount()}}</span>
              </li>
              @endforeach
              </li>
              </div>
              </div>
              
  </div>
  @endif

 