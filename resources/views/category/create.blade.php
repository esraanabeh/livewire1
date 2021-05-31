{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

  <!-- /.login-logo -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  <div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Add new category</p>

        <form   action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
         
           @include('category.partials.form' ,['create'=>true])
        </form>
        
    </div>
    <!-- /.Register-card-body -->
</div>


{{-- @endsection --}}