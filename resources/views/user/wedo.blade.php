<div class="wedo ">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>What We Do</h2>
                <p>It is a long established fact that a reader will be distracted by the </p>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-10 offset-md-1">
             <div class="row">

               @foreach ($services as $valueServices )
               <div class="col-md-6 margin_bottom">
                  <div class="work">
                     <figure><img src="services_images/{{$valueServices -> image}}"  alt="#" /></figure>
                  </div>
                  <div class="work_text">
                     <h3>{{$valueServices -> name}}<br><span class="blu">{{$valueServices -> description}}</span></h3>
                  </div>
               </div>
               
               @endforeach
                
   
             </div>
             <a class="read_more" href="#">See More</a>
          </div>
       </div>
    </div>
 </div>