
@extends('admin.layouts.master')

@section('css')
@endsection
@section('title')
    All Products
@stop

@section('page-header')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> All Products</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                @if (session('msg'))
                                    <div class="alert alert-{{ session('type') }}">
                                        {{ session('msg') }}
                                    </div>
                                @endif

                                <div>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="bg-dark text-white">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @forelse ($products as $product)
                                            <tr id="{{ $product->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->trans_name }}</td>
                                                <td><img width="70" src="{{ asset($product->image->path??'') }}" alt="">
                                                </td>
                                                <td>{{ $product->category->trans_name }}</td>
                                                <td>{{ $product->created_at->format('F m, Y') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.products.edit', $product) }}"
                                                       class="btn btn-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                                                    <form class="d-inline"
                                                          action="{{ route('admin.products.destroy', $product->id) }}"
                                                          method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are you sure?!')"
                                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Data</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


