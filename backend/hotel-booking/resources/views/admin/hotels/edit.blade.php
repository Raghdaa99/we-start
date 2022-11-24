@extends('admin.master')


@section('title','')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('hotels.update',$hotel)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Save" class="btn btn-info">
                    </div>
                </div>
                <br>
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
                                    <label for="name">Hotel name</label>
                                    <input type="text" id="name" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{old('name',$hotel->name)}}">

                                </div>
                                <div class="form-group">
                                    <label for="location">location</label>
                                    <input type="text" id="location" name="location"
                                           class="form-control @error('location') is-invalid @enderror"
                                           value="{{old('location',$hotel->location)}}">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea type="text" id="desc" name="desc"
                                              class="form-control @error('desc') is-invalid @enderror"
                                    >
                                        {{old('desc',$hotel->desc)}}
                                    </textarea>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" id="price" name="price"
                                                   class="form-control @error('price') is-invalid @enderror"
                                                   value="{{old('price',$hotel->price)}}">

                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="price_special">Special Price</label>
                                            <input type="number" id="price_special" name="price_special"
                                                   class="form-control @error('price_special') is-invalid @enderror"
                                                   value="{{old('price_special',$hotel->price_special)}}">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Add Multiple Images</label>
                                    <input type="file" class="form-control" name="images[]" multiple/>
                                </div>

                                <label>Images</label>
                                @foreach($hotel->images as $image)
                                    <div class="form-group">
                                        <img src="{{asset('uploads/'.$image->path)}}" alt="" width="80"/>
                                        <button class="btn btn-danger btn-sm" type="button"
                                                onclick="deleteImage('{{$image->id}}',this)">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </div>
                            @endforeach
                            <!-- /.card-body -->
                            </div>


                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </form>
        </div>

    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
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
            axios.delete(`/image/${id}`).then((response) => {
                reference.closest('div').remove();
                toastr.success(response.data.message);
            }).catch((error) => {
                console.log(error.response.data.message);
                toastr.error(error.response.data.message);
            });
        }
    </script>
@endsection


