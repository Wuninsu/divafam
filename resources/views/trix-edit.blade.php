<!DOCTYPE html>
<html>

<head>
    <title>Summernote Rich</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
</head>

<body>
    <div class="container">

        <div class="card mt-5">
            <h3 class="card-header p-3">
                <div class="mt-4">
                    <a href="{{ route('trix.index') }}" class="btn btn-secondary">Back to Posts</a>
                    <!-- You can add edit or delete options if needed -->
                </div>
            </h3>
            <div class="card-body">
                <form action="{{ route('trix.update',['id'=>$post->id]) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Title"
                            value="{{ $post->title ?? old('title') }}">
                    </div>

                    <div class="form-group">
                        <strong>Slug:</strong>
                        <input type="text" name="slug" class="form-control" placeholder="Slug"
                            value="{{ $post->slug ?? old('slug') }}">
                    </div>

                    <div class="form-group">
                        <strong>Body:</strong>
                        <textarea name="body" id="body" cols="30" rows="10"
                            class="form-control ">{{$post->body}}</textarea>
                    </div>

                    <div class="form-group mt-2">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#body').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
</body>

</html>