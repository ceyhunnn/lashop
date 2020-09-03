@extends('frontend.layout')
@section('title',"Contact")
@section('content')


<section id="aa-catg-head-banner">
 <img height="300px" width="100%" src="/backend/login/lg1.jpg" alt="fashion img">
 <div class="aa-catg-head-banner-area">
   <div class="container">
    <div class="aa-catg-head-banner-content">
      <h2>Contact</h2>
      <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Contact</li>
      </ol>
    </div>
   </div>
 </div>
</section>
<!-- / catg header banner section -->
<!-- start contact section -->
<section id="aa-contact">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="aa-contact-area">

         <!-- Contact address -->
         <div class="aa-contact-address">
           <div class="row">
             <div class="col-md-8">
               <div align="center">
                 <h1>Contact Us</h1>
               </div>
               @if (session()->has('success'))
                  <div class="alert alert-success">
                    <ul>
                        <li>{{session('success')}}</li>
                    </ul>
                  </div>
              @endif
               @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
              @endif
               <div class="aa-contact-address-left">
                 <form class="comments-form contact-form" method="post">
                   @CSRF
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" name="name" required placeholder="Your Name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="email" name="email" required placeholder="Email" class="form-control">
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" name="subject" required placeholder="Subject" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <textarea class="form-control" name="message" required rows="3" placeholder="Message"></textarea>
                  </div>
                  <button type="submit" class="aa-secondary-btn">Send</button>
                </form>
               </div>

             </div>
             <div class="col-md-4">
             <div class="aa-contact-address-right">
               <address>
                 <h4>{{$title}}</h4>
                 <p>{{$description}}</p>
                 <p><span class="fa fa-home"></span>{{$adres}}</p>
                 <p><span class="fa fa-phone"></span>{{$phone}}</p>
                 <p><span class="fa fa-envelope"></span>Email: {{$mail}}</p>
               </address>
             </div>
           </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</section>


@endsection

@section('css')
@endsection

@section('js')
@endsection
