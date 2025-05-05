<head>
<meta charset="utf-8" />
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link href="{{ asset('assets/css2/bootstrap-creative.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
  <link href="{{ asset('assets/css2/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="{{ asset('assets/css2/icons.min.css') }}" rel="stylesheet" type="text/css" />
  @livewireStyles
<body>
<div class="container text-center" style="height: 100vh; display: flex; flex-direction: column; justify-content: center;">
    <img src="{{ asset('assets/images/users/404-landing-page.svg') }}" alt="404 Image" class="img-fluid mb-4" />
    <div>
        <a href="{{ url('/') }}" class="btn btn-primary">Go to Home</a>
        <a href="javascript:history.back()" class="btn btn-secondary">Back</a> <!-- Back button -->
    </div>
</div>
@livewireScripts

</body>
</head>