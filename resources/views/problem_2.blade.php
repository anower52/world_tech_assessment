<!doctype html>
<html lang="en">
<head>
    <title>Problem 2</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div>
    <a href="{{ route('problem_1') }}" class="btn btn-success">Problem 1</a>
    <a href="{{ route('problem_2') }}" class="btn btn-info">Problem 2</a>
</div>

<div class="container my5 py-5">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route('problem2Operation') }}">
                @csrf
                    <div class="form-group">
                        <label for="input_array">Enter array of integers</label>
                        <input type="text" name="input_array" class="form-control" id="input_array"placeholder="1,2,3...">
                    </div>
                    <div class="form-group">
                        <label for="find_in_array">Enter a number</label>
                        <input type="number" name="find_in_array" class="form-control" id="find_in_array"placeholder="Enter a number to find in above array">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <h5 class="mt-5">OUTPUT:</h5>
            <div style="min-height: 100px; min-width: 150px; border: 1px solid gray; margin-top: 5px">
                @if(Session::has('output'))
                    <p class=" {{ Session::get('alert-class', '') }}">{{ Session::get('output') }}</p>
                @endif
            </div>

        </div>
    </div>
</div>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
</html>