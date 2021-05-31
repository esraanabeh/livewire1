
    showModal = function(){

        $('#saveBtn').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Create New product");
        $('#ajaxModel').modal('show');
    };





    
    $('body').on('click', '.editproduct', function () {
      var product_id = $(this).data('id');
      $.get( "/product"+'/' + product_id +'/edit', function (data) {
          $('#modelHeading').html("Edit product");
          $('#saveBtn').val("edit-product");
          $('#ajaxModel').modal('show');
          $('#product_id').val(data.id);
          $('#nameAr').val(data.nameAr);
          $('#nameEn').val(data.nameEn);
          $('#category_id').val(data.category_id);
          $('#image').val(data.image);
          $('#price').val(data.price);
       } )
   });

  
    


   $('#productForm').on('submit',function(event){

    
        event.preventDefault();
        let formData = new FormData(this);
        $(this).html('Save');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
        
        });
    
        $.ajax({
            
          data: formData,
          url: "/product",
          type: "POST",
          dataType: 'json',
          contentType:false,
          processData:false,
          
          
          success:( response) => {
              if(response){
                this.reset();
                $('#ajaxModel').modal('hide');
                table.draw();
                
              }
              
     
              // $('#productForm').trigger("reset");
              
              // table.draw();
         
          },
          error: function (response) {
              console.log(response);
            
          }
      });

    });

    



        $('body').on('click', '.deleteproduct', function () {
     
        var product_id = $(this).data("id");
        // confirm("Are You sure want to delete !");
        
        console.log(this);
      
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },

            type: "DELETE",
            url:"/product"+'/'+product_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    


