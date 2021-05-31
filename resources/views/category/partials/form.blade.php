


{{-- <form method="POST"  action="{{route('category.store')}}" enctype="multipart/form-data">  --}}

    @csrf
    <div class="input-group mb-3">
        <input id="nameAr" type="text" placeholder="Name in arabic" class="form-control @error('name') is-invalid @enderror" name="nameAr" 
        value="{{ old('name') }}  @isset($category) {{$category->nameAr}}@endisset " required autocomplete="nameAr" autofocus>       
                 <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
        </div>
        @error('nameAr')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    <div class="input-group mb-3">
        <input id="nameEn" type="text" placeholder="Name in English" class="form-control @error('name') is-invalid @enderror" name="nameEn" 
        value="{{ old('name') }}  @isset($category) {{$category->nameEn}}@endisset " required autocomplete="nameEn" autofocus>       
                 <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
        </div>
    
    
    
    
    
    
    
    <div class="form-group">
        <label for="file">choose image</label> 
        <div class="custom-file">
            <input type="file" name="image" class="form-control" onchange="previewFile(this)">
            <img  id="previewImg" alt="image" style="max-width:130px;margin-top:20px;">
            
        </div>
    
        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    
    
    
    
    </div>
    
    
    </div>
    
    
    
    
    <div class="input-group mb-3">
        <button type="submit" class="btn btn-primary btn-block">Add category</button>
    </div>
    {{-- </form> --}}
    
    
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