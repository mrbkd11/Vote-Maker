<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        #activevote{
            align-items: center ;
            text-align: center
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="row" id="activevote">
        <h2>
{{$activevote->question}} 
        </h2>
    </div>
    <div class="row">
        <div class="col">
           <button class="btn btn-success" id="start-timer">start timer</button>
        </div>
        <div class="col h2" id="numyes"></div>
        <div class="col" id="numnom"></div>
        <div class="col" id="numabs"></div>
     
    </div>
    </div>
    
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js">  </script>
<script>
//  $.ajax({
//     type: 'get',
//     url: '/votetimer/livevote',
//     dataType: 'JSON',
//     data: {'id': {{$activevote->id}}}, 
//     success: function(data) {
//       console.log(data);
//       $("#numyes").html(data.count) ;   }
//   });


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    
  function sendRequest() {
  $.ajax({
    type: 'get',
    url: '/votetimer/livevote',
    dataType: 'JSON',
    data: {'id': {{$activevote->id}}}, 
    success: function(data) {
      console.log(data);
      $("#numyes").html(data.count);
    }
  });
}
sendRequest();
$(document).ready(function() {
  var timer;
  $('#start-timer').on('click', function() {
    $(this).hide(); 
    timer = setTimeout(function() {
      // Set is_active to 0
      $.ajax({
        type: 'POST',
        url: '/votetimer/deactivatevote',
        data: {'id': '{{$activevote->id}}'},
        success: function(data) {
            
          console.log(data);
        }
      });
    }, 10000);

    setInterval(function() {
      sendRequest();
    }, 3000);
  });
});
</script>

</html>