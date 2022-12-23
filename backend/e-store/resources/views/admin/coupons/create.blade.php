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
                <h4 class="mb-0"> Add New Coupon</h4>
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

                        <x-errors />

                        <form action="{{ route('admin.coupons.store') }}" method="POST" enctype="multipart/form-data">
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

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Code</label>
                                                <input type="text" name="code" class="form-control" placeholder="Code">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select name="type" class="form-control custom-select">
                                                    <option value="value">Value</option>
                                                    <option value="percentage">Percentage</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Value</label>
                                                <input type="text" name="value" class="form-control" placeholder="Value">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Expire</label>
                                                <input type="date" name="expire" class="form-control" placeholder="Expire">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Usage</label>
                                                <input type="number" name="usage" class="form-control" placeholder="Usage">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Product</label>
                                                <select name="product_id" class="form-control custom-select">
                                                    <option value="">-- Select --</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->trans_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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

