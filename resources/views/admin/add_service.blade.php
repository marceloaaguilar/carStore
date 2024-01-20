<!DOCTYPE html>
<html lang="en">
    @include('admin.css');
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include ('admin.sidebar');
      <!-- partial -->
      @include ('admin.navbar');
      
      <div class="container-fluid page-body-wrapper" id="form_service">
        <div class="display:grid">

          @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
              X
            </button>
            {{session()-> get('message')}}
          </div>
          @endif

          <h3 id="title-action">Add a new Service</h3>
          <form action="{{url('upload_service')}}" style="margin-top: 1rem" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label  class="form-label" for="">Service Name</label>
              <input type="text" class='form-control' name="name" required>
            </div>
            <div class="mb-3">
              <label  class="form-label" for="">Service Description</label>
              <input type="text" class='form-control' name="description" required>
            </div>
            <div class="mb-3">
              <label class="form-label" for="">Image</label>
              <input type="file" class='form-control' name="serviceImage" required>
            </div>
            <button type="submit" class="btn btn-success" >Submit</button>
          </form>
        </div>
        </div>
    </div>
    <!-- container-scroller -->
   @include('admin.script');
  </body>
</html>