@extends('admin.master')


@section('title','')

@section('styles')
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Category
            </button>
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Projects</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 8%">
                                Category Name
                            </th>
                            <th style="width: 8%">
                                Slug
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>

                            <th style="width: 8%">
                                Created at
                            </th>
                            <th style="width: 8%">
                                Updated at
                            </th>

                            <th style="width: 20%">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->id}}
                                </td>
                                <td>
                                    <a>
                                        {{$category->title}}
                                    </a>
                                    <br>

                                </td>
                                <td>
                                    <a>
                                        {{$category->slug}}
                                    </a>
                                    <br>

                                </td>
                                <td class="project-state">
                                    <span
                                        class="badge badge-{{$category->status==='active'? 'success': 'danger'}}"> {{$category->status}}</span>
                                </td>
                                <td>
                                    <small>
                                        {{$category->created_at}}
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        {{$category->updated_at}}
                                    </small>
                                </td>
                                <td class="project-actions">

                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $category->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm"
                                            onclick="deleteCategory('{{$category->id}}',this)">
                                        <i class="fas fa-trash">
                                        </i>

                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                Edit Category
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.categories.update',$category)}}"
                                                  method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="title">Category title</label>
                                                        <input type="text" id="title" name="title"
                                                               value="{{$category->title}}" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select id="status" name="status"
                                                                class="form-control custom-select">
                                                            <option value="active" @selected(old(
                                                            'status') == 'active')>active</option>
                                                            <option value="draft" @selected(old(
                                                            'status') == 'draft')>draft</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ __('Close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ __('submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                @empty
                                    <tr>
                                        <td colspan="7">No Data Found</td>
                                    </tr>
                        @endforelse


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            Add Category
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Category title</label>
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control custom-select">
                                        <option value="active">active</option>
                                        <option value="draft">draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ __('Close') }}</button>
                                <button type="submit" class="btn btn-success">{{ __('submit') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Trashed Categories</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 8%">
                                Category Name
                            </th>
                            <th style="width: 8%">
                                Slug
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>

                            <th style="width: 8%">
                                Created at
                            </th>
                            <th style="width: 8%">
                                Updated at
                            </th>

                            <th style="width: 20%">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categoriesTrashed as $category)
                            <tr>
                                <td>
                                    {{ $category->id}}
                                </td>
                                <td>
                                    <a>
                                        {{$category->title}}
                                    </a>
                                    <br>

                                </td>
                                <td>
                                    <a>
                                        {{$category->slug}}
                                    </a>
                                    <br>

                                </td>
                                <td class="project-state">
                                    <span
                                        class="badge badge-{{$category->status==='active'? 'success': 'danger'}}"> {{$category->status}}</span>
                                </td>
                                <td>
                                    <small>
                                        {{$category->created_at}}
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        {{$category->updated_at}}
                                    </small>
                                </td>
                                <td class="project-actions">

                                    <a type="button" class="btn btn-info btn-sm"
                                       href="{{route('admin.categories.restore',$category->id)}}">
                                        <i class="fa fa-undo"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm"
                                            onclick="forceDelete('{{$category->id}}',this)">
                                        <i class="fas fa-times">
                                        </i>
                                        Delete
                                    </button>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7">No Data Found</td>
                            </tr>
                        @endforelse


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->

    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{--    <script>alert(1)</script>--}}
    <script>
        function deleteCategory(id, reference) {

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
            axios.delete(`/admin/categories/${id}`).then((response) => {
                reference.closest('tr').remove();
                toastr.success(response.data.message);
            }).catch((error) => {
                console.log(error.response.data.message);
                toastr.error(error.response.data.message);
            });
        }

        function forceDelete(id, reference) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    performForceDelete(id, reference)
                }
            })
        }

        function performForceDelete(id, reference) {
            axios.get(`/admin/categories/${id}/forceDelete`).then((response) => {
                reference.closest('tr').remove();
                toastr.success(response.data.message);
            }).catch((error) => {
                console.log(error.response.data.message);
                toastr.error(error.response.data.message);
            });
        }
    </script>
@endsection
