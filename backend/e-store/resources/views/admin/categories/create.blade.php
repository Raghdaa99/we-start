@extends('admin.layouts.master')

@section('css')
@endsection
@section('title')
    Category
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Add New Category</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Page Title</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

{{--                        <x-errors />--}}

                        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>English Name</label>
                                                <input type="text" name="en_name" class="form-control" placeholder="English Name">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Arabic Name</label>
                                                <input type="text" name="ar_name" class="form-control" placeholder="Arabic Name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputImage">Image</label>
                                        <input type="file" name="image" class="form-control" id="inputImage">
                                    </div>

                                    <div class="form-group">
                                        <label>Parent</label>
                                        <select name="parent_id" class="form-control custom-select">
                                            <option value="">-- Select --</option>
                                            {{--                                    @foreach ($categories as $category)--}}
                                            {{--                                    <option value="{{ $category->id }}">{{ $category->trans_name }}</option>--}}
                                            {{--                                    @endforeach--}}
                                        </select>
                                    </div>


                                    <button class="btn btn-success">Save</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    <!-- row closed -->
@endsection
@section('js')

@endsection

