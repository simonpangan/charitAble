<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link href="{{ mix('/css/vendor.css') }}" rel="stylesheet" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    @inertiaHead
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
  </head>
  <body>

    <noscript>
    <x-noscript/>    
   </noscript>

    @routes
    @inertia

    
  
    <script>
        window.domain = "{{ env('APP_URL') }}";
        window.csrf =  "{{ csrf_token() }}";
    </script>

    <script src="{{ mix('/js/manifest.js') }}" defer></script>
    <script src="{{ mix('/js/vendor.js') }}" defer></script>
    <script src="{{ mix('/js/app.js') }}" defer></script>
    
  </body>
</html>
