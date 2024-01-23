<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>mical</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

   </head>
   <!-- body -->
   <body class="main-layout">

      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="{{url('home')}}"> Home  </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="furnitures.html">Furnitures</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="testimonial.html">Testimonial</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.html">Contact Us</a>
                              </li>

							  @if(Route::has('login'))
							  @auth
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{url('myappointment')}}">My Appointments</a>
                                </li>
							  <x-app-layout>
							  </x-app-layout>

							  @else
                              <li class="nav-item d_none">
                                 <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-circle padd_right" aria-hidden="true"></i>Login</a>
                              </li>
							  <li class="nav-item d_none">
								<a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-circle padd_right" aria-hidden="true"></i>Register</a>
							 </li>

							 @endauth
							 @endif
                              <li class="nav-item d_none">
                                 <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      @if (session()->has('message'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">
              X
            </button>
            {{session()-> get('message')}}
      </div>
      @endif
      <div class="table-appointment">
        <table>
            <tr>
                <th>Service</th>
                <th>Date</th>
                <th>Message</th>
                <th>Status</th>
                <th>Cancel Appointment</th>
            </tr>
            @foreach ($appointment as $appointments)
            <tr>
                <td>{{$appointments -> service}}</td>
                <td>{{$appointments -> created_at}}</td>
                <td>{{$appointments -> message}}</td>
                @if ($appointments -> status == 'Canceled')
                    <td style="color:rgb(255, 89, 89); font-weight:700">{{$appointments -> status}}</td>
               @else 
                    <td>{{$appointments -> status}}</td>
                @endif
                <td><a class="btn btn-danger" href="{{url('cancelAppointment',$appointments -> id)}}">Cancel</a></td>
            </tr>
            @endforeach
        </table>
      </div>


      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>