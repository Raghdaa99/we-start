<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invitation</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5" style="max-width: 800px">
    <div class="card card-primary">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::get('success'))
            <div class="alert alert-success">
                <ul>

                    <li>{{ Session::get('success') }}</li>

                </ul>
            </div>
        @endif
        <div class="card-header bg-secondary">
            <h3 class="card-title text-white ">Create Invitation</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('invitations.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-2">
                    <label for="conference_name">Conference Name</label>
                    <input type="text" id="conference_name" name="conference_name" class="form-control">
                </div>
                <div class="form-group">
                    <label> Description</label>
                    <textarea name="desc" class="form-control contentarea"
                              placeholder="Description" rows="5"></textarea>
                </div>

                <div class="form-group mt-2">
                    <label>Logos Companies</label>
                    <div class="dropzone" id="gallery">
                        <div class="dz-message">
                            Upload Logos Companies
                        </div>
                    </div>
                    <div class="gallery-wrapper"></div>
                </div>
                <input type="submit" class="btn btn-primary mt-3" value="Save">
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>
</body>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.0/tinymce.min.js"></script>

<script>
    tinymce.init({
        selector: '.contentarea'
    })
    Dropzone.autoDiscover = false;
    var uploadedDocumentMap = {}
    let myDropzone = new Dropzone("div#gallery",{
        url: "{{ route('add_image') }}",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        addRemoveLinks: true,
        success: function (file, response) {
            let img = `<input type="hidden" name="album[]" value="${response}" />`
            document.querySelector('.gallery-wrapper').insertAdjacentHTML("beforeend", img);
            uploadedDocumentMap[file.name] = response
        },
        removedfile: function (file) {
            file.previewElement.remove()
            name = uploadedDocumentMap[file.name];
            document.querySelector('input[name="album[]"][value="' + name + '"]').remove()
        }
    });

</script>
</html>
