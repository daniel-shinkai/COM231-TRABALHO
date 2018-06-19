<head>
<base href="{{URL::asset('/')}}" target="_top">

<meta name="csrf-token" content="{{ csrf_token() }}" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

<script type="text/javascript" src="{{ URL::asset('js/faixaEtaria.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/faixaEtaria.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/input.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />


<link rel="stylesheet" href="layout/css/bootstrap.min.css">
<link rel="stylesheet" href="layout/css/fontawesome-all.min.css">
<link rel="stylesheet" href="layout/css/datatables.min.css">
<link rel="stylesheet" href="layout/css/fullcalendar.min.css">
<link rel="stylesheet" href="layout/css/bootadmin.min.css">


<script src="layout/js/bootstrap.bundle.min.js"></script>
<script src="layout/js/datatables.min.js"></script>
<script src="layout/js/moment.min.js"></script>
<script src="layout/js/fullcalendar.min.js"></script>
<script src="layout/js/bootadmin.min.js"></script>


<script type="text/javascript" src="{{ URL::asset('js/input.js') }}"></script>


<title>Trabalho COM231</title>
</head>
<body class="no-skin">
@include('layout.header')
<div>
  @include('layout.sidebar')
  <div class="main-content"> 
    <div class="main-content-inner">
     
      @yield('content') 
    </div>
  </div>
</div>
</body>