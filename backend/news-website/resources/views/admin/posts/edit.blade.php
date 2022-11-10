@extends('admin.master')


@section('title','')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Post title</label>
                                    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                                           class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control custom-select">
                                        <option value="active" @selected(old(
                                        'status', $post->status) == 'active')>active</option>
                                        <option value="draft" @selected(old(
                                        'status' , $post->status) == 'draft')>draft</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select id="category_id" name="category_id"
                                            class="form-control custom-select @error('category_id') is-invalid @enderror">

                                        <option selected="" disabled="">Select one</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                    @selected(old('category_id' , $post->category->id) ==
                                            $category->id)>
                                            {{$category->title}}
                                            </option>

                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image"
                                           class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <img src="{{$post->image_url}}" width="200" height="200">

                                <br>
                                <br>

                                <div class="form-group">
                                    <label for="inputDescription">Post Description</label>
                                    <textarea class="form-control" name="description" id="description">
                                       {{old('description',$post->description)}}
                                    </textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Save" class="btn btn-info">
                    </div>
                </div>
            </form>
        </div>

    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: ['code']
        });
    </script>
@endsection
