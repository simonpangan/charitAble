<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link
      rel="stylesheet"
      href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"
    />
    <link href="{{ mix('/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

    <script src="{{ mix('/js/bootstrap.js') }}" defer></script>
    <script src="{{ mix('/js/inertia-vue.js') }}" defer></script>
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @inertiaHead
  </head>
  <body>
    @routes
    @inertia
  </body>
</html>
