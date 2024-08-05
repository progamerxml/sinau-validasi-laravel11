<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                    <strong>{{ $error }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <h1 class="text-capitalize my-3">Buat Postingan</h1>
        <form action="/post" method="post">
            @csrf
            <div class="mb-3">
                <label for="titlePost" class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" id="titlePost" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="contentPost" class="form-label">Content</label>
                <textarea class="form-control" name="post" id="contentPost" rows="3">{{ old('post') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="authorName" class="form-label">Author</label>
                <input type="text" class="form-control" name="author[name]" id="authorName" value="{{ old('author.name') }}">
            </div>
            <div class="mb-3">
                <label for="authorEmail" class="form-label">Email Author</label>
                <input type="text" class="form-control" name="author[email]" id="authorEmail" value="{{ old('author.email') }}">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="versionPost" name="v1.0">
                <label class="form-check-label" for="versionPost">Version 1.0</label>
            </div>
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
