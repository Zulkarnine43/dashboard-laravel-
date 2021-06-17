$('#print').on('click', function() {
  let CSRF_TOKEN = $('meta[name="csrf-token"').attr('content');
  let invoice = $('p[name="invoice"').attr('content');
  $.ajaxSetup({
    url: '/print/',
    type: 'POST',
    data: {
      _token: CSRF_TOKEN,
      invoice: invoice
    },
    beforeSend: function() {
      console.log('printing ...');
    },
    complete: function() {
      console.log('printed!');
    }
  });
  // cache: false,
  $.ajax({
    success: function(viewContent) {
      document.body.innerHTML=viewContent;
      $.print(viewContent);
      setTimeout(function(){
        location.reload(true);				
      }, 500);				
    }
  });
});
