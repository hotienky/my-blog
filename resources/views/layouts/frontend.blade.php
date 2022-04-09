<!doctype html>
<html lang="en">
  <head>
    @yield('title')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('front/fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/fonts/flaticon/font/flaticon.css') }}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="shortcut icon" href="{{asset('img/rifkidev.ico')}}">
  </head>
  <body>
  <center>
                <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Allow for Notification</button>
            </center>

    <div class="wrap">

      <header role="banner">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-9 social">
                <a href="{{ $setting->fb }}"><span class="fa fa-facebook"></span></a>
                <a href="{{ $setting->twitter }}"><span class="fa fa-twitter"></span></a>
                <a href="{{ $setting->instagram }}"><span class="fa fa-instagram"></span></a>
              </div>
              <div class="col-3 search-top">
                <!-- <a href="#"><span class="fa fa-search"></span></a> -->
                <form action="{{ route('front.article') }}" method="get" class="search-top-form">
                  <span class="icon fa fa-search"></span>
                  <input type="text" name="q" placeholder="Type keyword to search..." value="{{Request::get('q')}}">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><a href="{{route('front.index')}}">KyDev.id</a></h1>
            </div>
          </div>
        </div>

		@include('layouts.frontend.module.menu')

      </header>
      <!-- END header -->

	  @yield('content')

    @include('layouts.frontend.module.footer')
      <!-- END footer -->

    </div>

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="{{ asset('front/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.stellar.min.js') }}"></script>


    <script src="{{ asset('front/js/main.js') }}"></script>

    <script>
      function balasKomentar(id, title) {
          $('#formReplyComment').show();
          $('#parent_id').val(id)
          $('#replyComment').val(title)
      }
    </script>


<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script>
  
    var firebaseConfig = {
      apiKey: "AIzaSyB7mprSl8o97RyQOKcG4AQYmWfW1HZ1r-I",
      authDomain: "my-blog-5cfd0.firebaseapp.com",
      databaseURL: "https://my-blog-5cfd0-default-rtdb.asia-southeast1.firebasedatabase.app",
      projectId: "my-blog-5cfd0",
      storageBucket: "my-blog-5cfd0.appspot.com",
      messagingSenderId: "8647800564",
      appId: "1:8647800564:web:9ff69d72a4f7d8a28c90a1",
      measurementId: "G-0LC02XX2M7"
    };
      
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
  
    function initFirebaseMessagingRegistration() {
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log("token", token);
   
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
  
                $.ajax({
                    url: '{{ route("save-token") }}',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token saved successfully.');
                    },
                    error: function (err) {
                        console.log('User Chat Token Error'+ err);
                    },
                });
  
            }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
     }  
      
    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });
   
</script>
  </body>
</html>
