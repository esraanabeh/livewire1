{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

  <!-- /.login-logo -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">




  <div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Edit category</p>

        <form method="POST"  action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
            @method('PATCH')
           @include('category.partials.form')
        </form>
        
    </div>
    <!-- /.Register-card-body -->
</div>


{{-- @endsection --}}