<footer id="contact">
    <div class="footer">
       <div class="container">
          <div class="row">
             <div class="col-md-4">
                <div class="titlepage">
                   <h2>Contact Us</h2>
                </div>
             </div>
             <div class="col-md-8">
                <ul class="location_icon">
                   <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> Locatins</li>
                   <li><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a> +71 9087654321</li>
                   <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>demo@gmail.com</li>
                </ul>
             </div>
             <div class="col-md-6">

               @if(session()->has('message'))
                  <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert">
                     X
                     </button>
                     {{session()-> get('message')}}
                  </div>
               @endif

               @if ($errors -> any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors ->all() as $error)
                              <li>{{ $error }}</li>                            
                        @endforeach
                     </ul>
                  </div>
               @endif

                <form id="request" action="{{url('appointments')}}" method="POST" class="main_form">
                  @csrf
                   <div class="row">
                      <div class="col-md-12 ">
                         <input class="contactus" name="name" placeholder="Full Name" type="type" name="Full Name"> 
                      </div>
                      <div class="col-md-12">
                         <input class="contactus" name="email" placeholder="Email" type="type" name="Email"> 
                      </div>
                      <div class="col-md-12">
                         <input class="contactus" name="phone" placeholder="Phone Number" type="type" name="Phone Number">                          
                      </div>

                      <div class="col-md-12">
                        <select name="service" placeholder="Select Your Service" class="contactus">
                           <option value="">Select Your Service</option>
                           @foreach ( $services as $valueServices)
                              <option value="{{$valueServices -> name}}">{{$valueServices -> name}}</option>
                           @endforeach

                        </select>
                      </div>
                      <div class="col-md-12">
                         <textarea class="textarea" name="message" placeholder="Message" type="type" Message="Name"></textarea>
                      </div>
                      <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
                         <button class="send_btn">Send</button>
                      </div>
                      <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
                         <ul class="social_icon">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                         </ul>
                      </div>
                   </div>
                </form>
             </div>
             <div class="col-md-6">
                <div class="map">
                   <figure><img src="images/map.jpg" alt="#"/></figure>
                </div>
                <form class="bottom_form">
                   <h3>Newsletter</h3>
                   <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                   <button class="sub_btn">subscribe</button>
                </form>
             </div>
          </div>
       </div>
       <div class="copyright">
          <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <p>Copyright 2019 All Right Reserved By <a href="https://html.design/"> Free  html Templates</a></p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </footer>