<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<form action="{{route('store')}}" method="POST" enctype="multipart/form-data" class="col-4 mb-3">
    @csrf
    <div class="mb-3">
        <label for="formFile" class="form-label">Please, select the required CSV file</label>
        <input class="form-control" type="file" name="file">
    </div>
    <button type="submit" class="md-3 btn btn-primary">Import</button>
    <a class="col-4" href="{{route('result')}}">View results</a>
</form>
<form action="#" class="col-4">
    @csrf
    <button type="submit" class="btn btn-danger">Clear all records</button>
</form>

</body>
</html>
