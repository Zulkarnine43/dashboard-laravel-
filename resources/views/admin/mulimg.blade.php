<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>vShop || Login Vendor</title>
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
      <link href="{{asset('css/vendorLogin.css')}}" rel="stylesheet" id="login-css">
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <script src="{{ asset('js/jquery.min.js')}}"></script>

      <style>
          img{
              width: 100px;
              height: 100px;
              margin:2px;
              border: 1px solid burlywood;
          }
    </style>
  </head>
<script>


function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img  src='"+URL.createObjectURL(event.target.files[i])+"'>");
 }
}
</script>
</head>
<body>
<div id="wrapper">
 <form action="upload_file.php" method="post" enctype="multipart/form-data">
  <input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple/>
  <input type="submit" name='submit_image' value="Upload Image"/>
 </form>
 <div id="image_preview"></div>
</div>
</body>
</html>