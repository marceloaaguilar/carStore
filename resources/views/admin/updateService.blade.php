<!DOCTYPE html>
<html lang="en">

    <base href="/public">
    @include('admin.css');
  <body>
    <div class="container-scroller">
      
        <!-- partial:partials/_sidebar.html -->
      @include ('admin.sidebar');

      @include ('admin.navbar');
        
      <div class="container-fluid page-body-wrapper" id="formUpdateServices">
          <form action="{{url('editService', $serviceData -> id)}}" style="margin-top: 1rem" method="POST" enctype="multipart/form-data">
            @if (session()->has('message'))
            <div class="alert alert-success" style="display:flex;justify-content: space-between">
                {{session()->get('message')}}
                <button type="button" class="close" data-bs-dismiss="alert">
                    X
                </button>
            </div>
            @endif
            <h3 id="title-action" style="margin-bottom: 2rem">Update Service</h3>
          @csrf
          <div class="mb-3">
            <label  class="form-label" for="">Service Name</label>
            <input type="text" class='form-control' name="name" value="{{$serviceData -> name}}" required>
          </div>
          <div class="mb-3">
            <label  class="form-label" for="">Service Description</label>
            <input type="text" class='form-control' name="description" value="{{$serviceData -> description}}" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="">Image</label>
            <img src="services_images/{{$serviceData -> image}}">
            <input type="file" class='form-control' id="btn-upload-image" name="image" required>
          </div>
          <button type="submit" class="btn btn-success" >Update</button>
        </form>

        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.script');
  </body>
</html>