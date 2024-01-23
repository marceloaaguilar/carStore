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
                    <th style="padding: 10px">Id</th>
                    <th style="padding: 10px">Customer Name</th>
                    <th style="padding: 10px" >E-mail</th>
                    <th style="padding: 10px" >Phone</th>
                    <th style="padding: 10px" >Service</th>
                    <th style="padding: 10px" >Message</th>
                    <th style="padding: 10px" >Status</th>
                    <th style="padding: 10px" >Cancel</th>
                </tr>
                @foreach ($dataAppointment as $dataAppointments)
                <tr align="center" id="table-admin-data">
                    <td>{{$dataAppointments -> id}}</td>
                    <td>{{$dataAppointments -> name}}</td>
                    <td>{{$dataAppointments -> email}}</td>
                    <td>{{$dataAppointments -> phone}}</td>
                    <td>{{$dataAppointments -> service}}</td></td>
                    <td>{{$dataAppointments -> message}}</td></td>
                    <td>{{$dataAppointments -> status}}</td></td>
                    <td><a class="btn btn-danger" href="{{url('cancelAppointment', $dataAppointments -> id)}}">Cancel</a></td></td>
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