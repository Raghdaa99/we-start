@push('scripts')
    <script>
        function edit_category(id) {
            let url = '{{ route("admin.categories.index") }}/' + id;
            $.get({
                url,
                success: (res) => {
                    $('#editModal form').attr('action', url)
                    $('#editModal input[name=en_name]').val(res.en_name)
                    $('#editModal input[name=ar_name]').val(res.ar_name)
                    $('#editModal img').attr('src', '/' + res.image.path)
                    $('#editModal select').val(res.parent_id)
                }
            })
        }

        $('#edit_form').on('submit', function (e) {
            e.preventDefault();

            var data = new FormData(this);
            let url = $('#editModal form').attr('action');
            $.ajax({
                type: 'post',
                url,
                data,
                cache: false,
                contentType: false,
                processData: false,
                success: (res) => {
                    console.log(res);
                    // $('#row_'+res.id+' td:nth-child(2)').text(res.trans_name);
                    // $('#row_'+res.id+' td:nth-child(3) img').attr('src', '/'+res.image.path)
                    // $('#row_'+res.id+' td:nth-child(4)').text(res.parent.trans_name);

                    // $('#editModal').modal('hide')
                }
            })
        })
    </script>
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
                    {{--                            @forelse ($categories as $category)--}}
                    {{--                                <tr id="row_{{ $category->id }}">--}}
                    {{--                                    <td>{{ $loop->iteration }}</td>--}}
                    {{--                                    <td>{{ $category->trans_name }}</td>--}}
                    {{--                                    <td><img width="70" src="{{ asset($category->image->path??'') }}" alt="">--}}
                    {{--                                    </td>--}}
                    {{--                                    <td>{{ $category->parent->trans_name }}</td>--}}
                    {{--                                    <td>{{ $category->created_at->format('F m, Y') }}</td>--}}
                    {{--                                    <td>--}}
                    {{--                                        <a onclick="edit_category({{ $category->id }})" data-id="{{ $category->id }}" data-toggle="modal" data-target="#editModal"--}}
                    {{--                                           class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></a>--}}
                    {{--                                        <form class="d-inline"--}}
                    {{--                                              action="{{ route('admin.categories.destroy', $category->id) }}"--}}
                    {{--                                              method="post">--}}
                    {{--                                            @csrf--}}
                    {{--                                            @method('delete')--}}
                    {{--                                            <button onclick="return confirm('Are you sure?!')"--}}
                    {{--                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>--}}
                    {{--                                        </form>--}}
                    {{--                                    </td>--}}
                    {{--                                </tr>--}}
                    {{--                            @empty--}}
                    {{--                                <tr>--}}
                    {{--                                    <td colspan="5">No Data</td>--}}
                    {{--                                </tr>--}}
                    {{--                            @endforelse--}}
                    </tbody>
                </table>
                {{--                        {{ $categories->links() }}--}}
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
                                {{--                                @foreach ($categories as $category)--}}
                                {{--                                    <option value="{{ $category->id }}">{{ $category->trans_name }}</option>--}}
                                {{--                                @endforeach--}}
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

