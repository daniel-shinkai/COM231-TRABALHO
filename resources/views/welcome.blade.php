
<!DOCTYPE html>
<html>
<head>
    
<meta name="csrf-token" content="{{ csrf_token() }}" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

<script type="text/javascript" src="{{ URL::asset('js/faixaEtaria.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/faixaEtaria.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/input.css') }}" />




<title>Page Title</title>
</head>
<body>

<div>

    <div class="container">
  
  <h2>Google Material Design in CSS3<small>Inputs</small></h2>
  
  <form method="post">
    
    <div class="group">      
      <input type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Name</label>
    </div>
      
    <div class="group">      
      <input type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
    </div>
    
    <div class="field">
        <button type="submit">Send</button>
    </div>

  </form>
      
 
  
<div id="chartDiv">
    <canvas id="myChart" width="400" height="400"></canvas>

</div>

</body>
</html>

