<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>
<body>
   <form method="POST" enctype="multipart/form-data" action="">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Your vote question:</label>
    <input type="text" class="form-control" id=""  name="question">
  
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="container">
    @foreach ($votes as $vote) 
    <div class="row">
        <div class="col">
            <h3> {{$vote->id}}
            </h3> 
        </div>
        <div class="col">
            <p>
                {{$vote->question}}
            </p>
        </div>
        <div class="col">
             <h4> 
                {{$vote->admin_id}} 

             </h4>
        </div>
        <div class="col">
            <a href="vote/{{$vote->id}}/delete"><button class="btn btn-danger">Delete</button></a>
        </div>
        
    </div>
    @endforeach
</div>
</body>
</html>