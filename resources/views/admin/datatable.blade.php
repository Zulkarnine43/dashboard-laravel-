<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
</head>

<body>
  
  <div class="box">
    <div class="box-body" style="text-align: center;">
        <h3>Previous Order</h3>
        <div id="newOrderCustRatingDiv">
        </div>
    </div>
    <div class="box-body">
        <table id="prevOTable" class="display nowrap table table-hover table-striped table-bordered" style="width:100%; text-allign: center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Date</th>
                    <th>Code</th>
                    
                
                </tr>
            </thead>
            <tbody class="tbody" >
               <tr>
                 <td>Hello Sir</td>
                 <td>Hello Mam</td>
                 <td>Hello Mam</td>
                 <td>Hello Mam</td>

               </tr>
               <tr>
                <td>Hello Mam</td>
                <td>Hello Mam</td>
                <td>Hello Mam</td>
                <td>Hello Mam</td>
                
              </tr>
            </tbody>
        </table>
    </div>
</div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script>
    $(document).ready(function(){
      alert("hello");
      var dataTableInstant=$( '#prevOTable' ).DataTable({
    		'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
        	'info': false,
            'autoWidth': true,
            'pageLength': 5
        } );
    });
  </script>
</body>
</html>
