<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
  <form method="POST" enctype="multipart/form-data" action="">
    @csrf
    <div class="container">
     <div class="row" style="text-align: center">
<h1>
  {{$vote->question}}
</h1>
     </div>
      <div class="row">
        <input type="hidden" name="userid" id="" value="{{$userid}}">
        <input type="radio" id="javascript" value="oui" name="reponse" required>
  <label for="javascript">oui</label>
      </div>
      <div class="row">
        <input type="radio" id="css" value="non" name="reponse" required>
  <label for="css">non</label>
      </div>
      <div class="row">
        <input type="radio" id="html" value="q" name="reponse" required>
  <label for="html">abstreint
  </label>
</div>
      <div class="row">
          <button type="submit" class="btn btn-primary">Submit </button>
   </div>
      </div>

</form>
</body>
</html>



{{-- @foreach ($results as $result)
{{$result->reponse}}
@endforeach --}}