{{-- @extends('layouts.admin')

@section('title')
product
@endsection

@section('content') --}}


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container">

  
    <h1>product</h1>
    <a class="btn btn-success"  id="createNewproduct" onclick="showModal()"> Create New product</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                
                <th>categoryname</th>
                <th>image</th>
                <th>price</th>
                <th>buyers</th>
                <th>views</th>
                <th width="300px">Action</th>
            </tr>
        </thead>


        <tbody>
            
           
            @foreach ($products as $product)

            <tr>
                
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            
            <td>{{$product->categoryname}}</td>
                  
            <td> <img src=" {{asset('image')}}/{{$product->image}}" style="max-width:60px;"/></td>
            <td>{{$product->price}}</td>
            <td>{{$product->buyers}}</td>
            <td>{{$product->views}}</td>

            <td>
               <a href="javascript:void(0)" data-toggle="tooltip"  data-id='{{$product->id}}' data-original-title="Edit" class="edit btn btn-primary btn-sm editproduct">Edit</a>
               <a href="javascript:void(0)" data-toggle="tooltip"  data-id='{{$product->id}}' data-original-title="Delete" class="btn btn-danger btn-sm deleteproduct">Delete</a> 
                
                
            </td>
            </tr>
            @endforeach 

               


        </tbody>
    </table>
</div>





<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data">
                   <input type="hidden" name="product_id" id="product_id" >
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nameAr" name="name" placeholder="Enter name " value="" maxlength="50" required="">
                        </div>
                    </div>

                   
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">category_id</label>
                        <div class="col-sm-12">
                            <textarea  name="category_id" required="" placeholder="category_id" class="form-control"></textarea>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label for="file">choose image</label> 
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" onchange="previewFile(this)">
                            <img  id="previewImg" alt="image" style="max-width:130px;margin-top:20px;">
                            <span class="text-danger" id="image-error"></span>
                            
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">price</label>
                            <div class="col-sm-12">
                                <textarea  name="price" required="" placeholder="inter price" class="form-control"></textarea>
                            </div>
                        </div>

      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-success" id="saveBtn"  >Save changes
                     </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


</div>
<script src="{{ asset('js/product.js') }}" defer></script>

<script>
    function previewFile(input){
        var image=$('input[type=file]').get(0).files[0];
        if(image){
            var reader = new FileReader();
            reader.onload = function(){
                $('#previewImg').attr("src",reader.result);
            }
            reader.readAsDataURL(image);
        }
       
    }
    </script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 

<script src="{{ asset('js/product.js') }}" defer></script>

<script type="text/javascript">

// console.log('alaa');

//     $('#createNewProduct').click(function () {
       
//         $('#saveBtn').val("create-product");
//         $('#product_id').val('');
//         $('#productForm').trigger("reset");
//         $('#modelHeading').html("Create New product");
//         $('#ajaxModel').modal('show');
//     });

//     $('body').on('click', '.editProduct', function () {
//       var product_id = $(this).data('id');
//       $.get("{{ route('product.index') }}" +'/' + product_id +'/edit', function (data) {
//           $('#modelHeading').html("Edit product");
//           $('#saveBtn').val("edit-product");
//           $('#ajaxModel').modal('show');
//           $('#book_id').val(data.id);
//           $('#title').val(data.title);
//           $('#author').val(data.author);
//       )
//    });



// });
    // $('#saveBtn').click(function (e) {
    //     e.preventDefault();
    //     $(this).html('Save');
    
    //     $.ajax({
    //       data: $('#productForm').serialize(),
    //       url: "{{ route('product.store') }}",
    //       type: "POST",
    //       dataType: 'json',
    //       success: function (data) {
     
    //           $('#productForm').trigger("reset");
    //           $('#ajaxModel').modal('hide');
    //           table.draw();
         
    //       },
    //       error: function (data) {
    //           console.log('Error:', data);
    //           $('#saveBtn').html('Save Changes');
    //       }
    //   });

    // });
    
//     $('body').on('click', '.deleteBook', function () {
     
//         var product_id = $(this).data("id");
//         confirm("Are You sure want to delete !");
      
//         $.ajax({
//             type: "DELETE",
//             url: "{{ route('product.store') }}"+'/'+book_id,
//             success: function (data) {
//                 table.draw();
//             },
//             error: function (data) {
//                 console.log('Error:', data);
//             }
//         });
//     });
// </script>


//       });