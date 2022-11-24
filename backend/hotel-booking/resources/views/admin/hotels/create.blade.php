@extends('admin.master')


@section('title','')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('content')
    <section class="content">
        =
        <div class="container-fluid">
            <form action="{{route('hotels.store')}}" method="post" enctype="multipart/form-data">
                @csrf
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
                                           value="{{old('name')}}">

                                </div>
                                <div class="form-group">
                                    <label for="location">location</label>
                                    <input type="text" id="location" name="location"
                                           class="form-control @error('location') is-invalid @enderror"
                                           value="{{old('location')}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" id="description" name="description"
                                              class="form-control @error('description') is-invalid @enderror"
                                    >
                                        {{old('description')}}
                                    </textarea>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" id="price" name="price"
                                                   class="form-control @error('price') is-invalid @enderror"
                                                   value="{{old('price')}}">

                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="price_special">Special Price</label>
                                            <input type="number" id="price_special" name="price_special"
                                                   class="form-control @error('price_special') is-invalid @enderror"
                                                   value="{{old('price_special')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Add Multiple Images</label>
                                    @error('images')
                                    <p class="text-red"> {{$message}}</p>
                                    @enderror
                                    <input type="file" class="form-control" name="images[]" multiple/>

                                </div>
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


