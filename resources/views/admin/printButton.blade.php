<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>
</head>

<body>
  
  <button id="print"> Print </button>
  <p name="invoice" content="VS5"></p>
 
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery.print.js') }}"></script>
  <script src="{{ asset('js/scripts.js') }}"></script>
  
</body>

</html>