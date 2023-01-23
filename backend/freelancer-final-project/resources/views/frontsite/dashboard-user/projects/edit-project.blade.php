@extends('frontsite.dashboard-user.master')
@section('content')
    <!-- Dashboard Headline -->
    <div class="dashboard-headline">
        <h3>Post a Task</h3>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs" class="dark">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li>Post a Task</li>
            </ul>
        </nav>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{route('user.projects.update',$project)}}" id="post-job" method="post" enctype="multipart/form-data">
        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-xl-12">
                <div class="dashboard-box margin-top-0">

                    <!-- Headline -->
                    <div class="headline">
                        <h3><i class="icon-feather-folder-plus"></i> Task Submission Form</h3>
                    </div>

                    <div class="content with-padding padding-bottom-10">
                        <div class="row">

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Project Name</h5>
                                    <input type="text" name="title" class="with-border"
                                           placeholder="e.g. build me a website"
                                           value="{{old('title',$project->title)}}">
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Category</h5>
                                    <select class="selectpicker with-border" data-size="7" title="Select Category"
                                            name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @selected($project->category_id ==
                                                $category->id)>{{ $category->trans_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Status</h5>
                                    <select class="selectpicker with-border" data-size="7" title="Select Status"
                                            name="status">
                                        <option @selected($project->status ==
                                            'open') value="open">Open</option>
                                        <option @selected($project->status ==
                                            'in-progress') value="in-progress">in-progress</option>
                                        <option @selected($project->status ==
                                            'closed') value="closed">Closed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="submit-field">
                                    <h5>What is your estimated budget?</h5>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="input-with-icon">
                                                <input class="with-border" type="text" placeholder="Minimum"
                                                       name="min_budget"
                                                       value="{{old('min_budget',$project->min_budget)}}">
                                                <i class="currency">USD</i>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="input-with-icon">
                                                <input class="with-border" type="text" placeholder="Maximum"
                                                       name="max_budget"
                                                       value="{{old('max_budget',$project->max_budget)}}">
                                                <i class="currency">USD</i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="feedback-yes-no margin-top-0">
                                        <div class="radio">
                                            <input id="fixed" name="type" value="fixed" type="radio" @checked($project->type
                                            == 'fixed')>
                                            <label for="fixed"><span class="radio-label"></span> Fixed Price
                                                Project</label>
                                        </div>
                                        <div class="radio">
                                            <input id="hourly" name="type" value="hourly" type="radio"
                                                   @checked($project->type == 'hourly')>
                                            <label for="hourly"><span class="radio-label"></span> Hourly Price
                                                Project</label>
                                        </div>
                                        {{--                                        @foreach($types as $type)--}}
                                        {{--                                            <div class="radio">--}}
                                        {{--                                                <input id="{{$type}}" value="{{$type}}" name="type" type="radio">--}}
                                        {{--                                                <label for="{{$type}}"><span class="radio-label"></span> {{$type}}--}}
                                        {{--                                                    Project</label>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        @endforeach--}}

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="submit-field">
                                    <h5>What skills are required? <i class="help-icon" data-tippy-placement="right"
                                                                     title="Up to 5 skills that best describe your project"></i>
                                    </h5>
                                    <div class="keywords-container">
                                        <div class="keyword-input-container">
                                            <input type="text" class="keyword-input with-border"
                                                   placeholder="Add Skills"/>
                                            <button type="button" class="keyword-input-button ripple-effect"><i
                                                    class="icon-material-outline-add"></i></button>
                                        </div>
                                        <div class="keywords-list">
                                            @forelse($project->tags as $tag)
                                                <span class="keyword"><span class="keyword-remove"></span><span
                                                        class="keyword-text">{{$tag->name}}</span></span>
                                            @empty

                                            @endforelse
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="submit-field">
                                    <h5>Describe Your Project</h5>
                                    <textarea name="description" cols="30" rows="5"
                                              class="with-border">{{$project->description}}</textarea>
                                    <div class="uploadButton margin-top-30">
                                        <input class="uploadButton-input" name="files[]" type="file"
                                               accept="image/*, application/pdf"
                                               id="upload" multiple/>
                                        <label class="uploadButton-button ripple-effect" for="upload">Upload
                                            Files</label>
                                        <span class="uploadButton-file-name">Images or documents that might be helpful in describing your project</span>
                                    </div>
                                    <div>
                                        <ul>
                                            @foreach($project->files as $file)
                                                <li>
                                                    <div>
                                                        <a href="{{ asset('storage/' . $file->path) }}">
                                                            {{ $file->name. substr($file->path,strpos($file->path ,'.'),strlen($file->path)) }}
                                                        </a>
                                                        <button type="button"
                                                                onclick="deleteImage('{{$file->id}}',this)"
                                                                class="button gray ripple-effect ico" title="Remove"
                                                                data-tippy-placement="top">
                                                            <i class="icon-feather-trash-2"></i>
                                                        </button>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <button type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i>
                    Edit a Task
                </button>
            </div>

        </div>
        <!-- Row / End -->
    </form>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#post-job').submit(function (e) {
            let keywords = document.querySelectorAll(".keywords-list span .keyword-text");
            let skills = [];
            keywords.forEach((e) => {
                skills.push(e.innerHTML);
                console.log(e.innerHTML);
            })

            e.preventDefault();

            var form = $(this);

            let data = new FormData(this);
            data.append('_method', 'put');
            data.append('tags', skills.join(', '));
            let url = form.attr('action');

            $.ajax({
                type: "post",
                url,
                data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    console.log(res.message)
                    toastr.success(res.message);
                },
                error: function (data) {
                    let errors = data.responseJSON;
                    // toastr.error(errors.message);
                    console.log(errors)
                },
            });

        });

        function addSkills() {
            let keywords = document.querySelectorAll(".keywords-list span .keyword-text");

            skills = "";
            keywords.forEach((e) => {
                skills += e.innerHTML + ", ";
                console.log(e.innerHTML);
            })
        }

        // console.log($('.keywords-list span:nth-child(3)').val);


        function deleteImage(id, reference) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    performDelete(id, reference)
                }
            })
        }

        function performDelete(id, reference) {
            $.ajax({
                type: "delete",
                url: `/user/image/${id}`,
                success: function (res) {
                    reference.closest('li').remove();
                    toastr.success(res.message);
                },
                error: function (error) {
                    console.log(error.responseJSON);
                    toastr.error(error.responseJSON);
                },
            });


        }
    </script>

@endsection
