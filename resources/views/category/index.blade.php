{{-- @extends('layouts.admin') --}}

{{-- @section('title')
Category
@endsection

@section('content') --}}


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">


<div class="row">
    <div class="col-12">
      <h1 class=float-left>categories</h1>
      <a class="btn btn-sm btn-success float-right" href="{{route('category.create' )}}"role="button">create</a>
  
  
    </div>
  
  </div>
  
  
  
  <div class="card">
  
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NameAr</th>
              <th scope="col">NameEn</th>
              
              
              <th scope="col">image</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($category as $category)
  
              <tr>
                  <th scope="row">{{$category->id}}</th>
                  <td>{{$category->nameAr}}</td>
                  <td>{{$category->nameEn}}</td>
                  
                  <td> <img src=" {{asset('image')}}/{{$category->image}}" style="max-width:60px;"/></td>



                  
                  <td>
                    <a class="btn btn-sm btn-primary" href="{{route('category.edit' ,$category->id)}}"role="button">Edit</a> 

                    
                    <form id="delete-category-fprm-{{$category->id}}" action="{{route('category.destroy',$category->id)}}"method="POST" >
                      <button class="btn btn-danger" type="submit"> delete</button>
                      
                      {{csrf_field()}}
                      @method("DELETE")
                    </form>

                    
                    
                   
                  </td>
  
  
                </tr>
                  
              @endforeach
           
            
          </tbody>
        </table>
  
  </div>
  {{-- @endsection --}}
