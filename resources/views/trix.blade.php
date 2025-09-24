<!DOCTYPE html>
<html>

<head>
    <title>How to Install and Use Trix Editor in Laravel 11 - DevScriptSchool.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

</head>

<body>

    <div class="container">
        <h1>Posts</h1>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->slug }}</p>
                        <div class="card-text">{!!$post->body !!}</div> <!-- Display body content -->
{{-- 
                        @if ($post->file_url)
                        <a href="{!! $post->file_url !!}" class="btn btn-primary" target="_blank">View File</a>
                        @endif --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container">

        <div class="card mt-5">
            <h3 class="card-header p-3">How to Install and Use Trix Editor in Laravel 11 - DevScriptSchool.com</h3>
            <div class="card-body">
                <form action="{{ route('trix.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Title"
                            value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <strong>Slug:</strong>
                        <input type="text" name="slug" class="form-control" placeholder="Slug"
                            value="{{ old('slug') }}">
                    </div>

                    <div class="form-group">
                        <strong>Body:</strong>
                        <input id="x" type="hidden" name="body">
                        <trix-editor input="x" class="trix-content"></trix-editor>
                    </div>

                    <div class="form-group mt-2">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script type="text/javascript">
        var fileUploadURL = "{{ route('trix.upload') }}";

        // (function() {
        //     var HOST = fileUploadURL; //pass the route

        //     addEventListener("trix-attachment-add", function(event) {
        //         if (event.attachment.file) {
        //             uploadFileAttachment(event.attachment)
        //         }
        //     })

        //     function uploadFileAttachment(attachment) {
        //         uploadFile(attachment.file, setProgress, setAttributes)

        //         function setProgress(progress) {
        //             attachment.setUploadProgress(progress)
        //         }

        //         function setAttributes(attributes) {
        //             attachment.setAttributes(attributes)
        //         }
        //     }

        //     function uploadFile(file, progressCallback, successCallback) {
        //         var formData = createFormData(file);
        //         var xhr = new XMLHttpRequest();

        //         xhr.open("POST", HOST, true);
        //         xhr.setRequestHeader('X-CSRF-TOKEN', getMeta('csrf-token'));

        //         xhr.upload.addEventListener("progress", function(event) {
        //             var progress = event.loaded / event.total * 100
        //             progressCallback(progress)
        //         })

        //         xhr.addEventListener("load", function(event) {
        //             var attributes = {
        //                 url: xhr.responseText,
        //                 href: xhr.responseText + "?content-disposition=attachment"
        //             }
        //             successCallback(attributes)
        //         })

        //         xhr.send(formData)
        //     }

        //     function createFormData(file) {
        //         var data = new FormData()
        //         data.append("Content-Type", file.type)
        //         data.append("file", file)
        //         return data
        //     }

        //     function getMeta(metaName) {
        //         const metas = document.getElementsByTagName('meta');

        //         for (let i = 0; i < metas.length; i++) {
        //             if (metas[i].getAttribute('name') === metaName) {
        //                 return
        //                 metas[i].getAttribute('content');
        //             }
        //         }
        //         return '';
        //     }
        // })();

        (function() {
    var HOST = fileUploadURL; // pass the route
    
    addEventListener("trix-attachment-add", function(event) {
        if (event.attachment.file) {
            console.log('File detected:', event.attachment.file);  // Log file here
            uploadFileAttachment(event.attachment);
        }
    });
    
    function uploadFileAttachment(attachment) {
        uploadFile(attachment.file, setProgress, setAttributes);
        
        function setProgress(progress) {
            attachment.setUploadProgress(progress);
        }
        
        function setAttributes(attributes) {
            attachment.setAttributes(attributes);
        }
    }
    
    function uploadFile(file, progressCallback, successCallback) {
        var formData = createFormData(file);
        var xhr = new XMLHttpRequest();
        
        xhr.open("POST", HOST, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', getMeta('csrf-token'));
        
        xhr.upload.addEventListener("progress", function(event) {
            var progress = event.loaded / event.total * 100;
            progressCallback(progress);
        });
        
        xhr.addEventListener("load", function(event) {
            var attributes = {
                url: xhr.responseText,
                href: xhr.responseText + "?content-disposition=attachment"
            };
            successCallback(attributes);
        });
        
        xhr.send(formData);
    }
    
    function createFormData(file) {
        var data = new FormData();
        data.append("file", file);
        return data;
    }
    
    function getMeta(metaName) {
        const metas = document.getElementsByTagName('meta');
        
        for (let i = 0; i < metas.length; i++) {
            if (metas[i].getAttribute('name') === metaName) {
                return metas[i].getAttribute('content');
            }
        }
        return '';
    }
})();
    </script>
</body>

</html>