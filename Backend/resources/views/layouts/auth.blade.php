<html lang="en">
      <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
    <title>{{$site->site_name ?? env('APP_NAME')}}- Admin|Login</title>
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
<link rel="shortcut icon" href="{{asset('app')}}/Legal zone icon.webp">
        <link rel="stylesheet" media="screen, print" href="{{asset('app')}}/css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="{{asset('app')}}/css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="mask-icon" href="{{asset('app')}}/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="{{asset('app')}}/css/page-login.css">


        @include('sweetalert::alert')










    <body>






@yield('content')






    	 </body>



















    	<script src="{{asset('app')}}/js/vendors.bundle.js"></script>
        <script src="{{asset('app')}}/js/app.bundle.js"></script>
</html>
