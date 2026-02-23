<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class='container'>
        <form action="{{ route('post-registration') }}" method="post">
            @csrf
            <div>
                <label for="mt-2">name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name">
                @error ('name') <span class="text danger">{{$message}}</span> @enderror
            </div>
            <div>
                <label for="mt-2">email <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="email">
                @error ('email') <span class="text danger">{{$message}}</span> @enderror
            </div>
            <div>
                <label for="mt-2">password <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="password">
                @error ('password') <span class="text danger">{{$message}}</span> @enderror
            </div>
            <div>
                <label for="mt-2">confirm password <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="confirm password">
                @error ('confirm password') <span class="text danger">{{$message}}</span> @enderror
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>