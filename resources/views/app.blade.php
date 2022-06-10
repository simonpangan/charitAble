<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link
      rel="stylesheet"
      href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"
    />
    
    <link href="{{ mix('/css/vendor.css') }}" rel="stylesheet" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    
    @inertiaHead
  </head>
  <body>
    @routes
    @inertia
    
    <script src="{{ mix('/js/vendor.js') }}" defer></script>
    <script src="{{ mix('/js/app.js') }}" defer></script>
  </body>
</html>
