@push('scripts')

@endpush
@extends('admin.layouts.master')

@section('css')
@endsection
@section('title')
    Categories
@stop

@section('page-header')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> All Categories</h4>
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

            @if (session('msg'))
                <div class="alert alert-{{ session('type') }}">
                    {{ session('msg') }}
                </div>
            @endif

            <div>
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Parent</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit_form" action="" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-body">
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
                            <img width="60" src="" alt="">
                        </div>

                        <div class="form-group">
                            <label>Parent</label>
                            <select name="parent_id" class="form-control custom-select">
                                <option value="">-- Select --</option>
                              
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" id="save_edit">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
@section('js')

@endsection

