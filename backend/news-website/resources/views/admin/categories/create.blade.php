@extends('admin.master')


@section('title','Create Category')

@section('styles')
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.categories.store') }}" method="post">
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
                                    <label for="title">Category title</label>
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control custom-select">
                                        <option selected="" disabled="">Select one</option>
                                        <option>active</option>
                                        <option>draft</option>
                                    </select>
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
@endsection
