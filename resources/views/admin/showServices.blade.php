<!DOCTYPE html>
<html lang="en">
    @include('admin.css');
  <body>
    <div class="container-scroller">
      
        <!-- partial:partials/_sidebar.html -->
      @include ('admin.sidebar');

      @include ('admin.navbar');

      <div class="container-fluid page-body-wrapper" id="table-appointments-admin">
          <div align="center" style="padding:10px" >
            @if (session()->has('message'))
            <div class="alert alert-success" style="display:flex;justify-content: space-between">
                {{session()->get('message')}}
                <button type="button" class="close" data-bs-dismiss="alert">
                    X
                </button>
            </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger" style="display:flex;justify-content: space-between">
                    {{session()->get('error')}}
                    <button type="button" class="close" data-bs-dismiss="alert">
                        X
                    </button>
                </div>
            @endif
            <table>
                <tr align="center" style="background-color: #00d25b">
                    <th style="padding: 10px" >Name</th>
                    <th style="padding: 10px" >Description</th>
                    <th style="padding: 10px" >Image</th>
                    <th style="padding: 10px" >Edit</th>
                </tr>
                @foreach ($dataServices as $services)
                <tr align="center" id="table-admin-data">
                    <td>{{$services -> name}}</td>
                    <td>{{$services -> description}}</td>
                    <td>
                        <img class="image_service_admin" src="services_images/{{$services -> image}}" alt="" srcset="">
                    </td>
                    <td>
                        <div class="deleteUpdateColumn">
                            <a href="{{url('updateService', $services -> id)}}">
                                <img src="images/pencil-square.svg" class="icon-edit" alt="">
                            </a>
                            <a href="">
                                <img src="images/trash3.svg" class="icon-edit" srcset="">
                            </a>
                        </div>
                        {{-- <a class="btn btn-danger" href="{{url('deleteService', $services -> id)}}">Delete</a> --}}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>





      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.script');
  </body>
</html>