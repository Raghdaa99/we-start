@extends('admin.master')


@section('title','')

@section('styles')
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
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
                                Post Title
                            </th>
                            <th style="width: 10%">
                                Image
                            </th>

                            <th style="width: 8%">
                                Category
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
                        @forelse($posts as $post)
                            <tr>
                                <td>
                                    {{ $post->id}}
                                </td>
                                <td>
                                    <a>
                                        {{$post->title}}
                                    </a>
                                    <br>
                                </td>
                                <td>
{{--                                    <img src="https://picsum.photos/id/7/400/300" alt="" width="100" height="100">--}}
                                    <img src="{{$post->image_url}}" alt="" width="100" height="100">
                                </td>
                                <td>
                                    {{ $post->category->title }}
                                </td>
                                <td class="project-state">
                                    <span
                                        class="badge badge-{{$post->status==='active'? 'success': 'danger'}}"> {{$post->status}}</span>
                                </td>
                                <td>
                                    <small>
                                        {{$post->created_at}}
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        {{$post->updated_at}}
                                    </small>
                                </td>
                                <td class="project-actions">

                                    <a type="button" class="btn btn-info btn-sm"
                                       href="{{route('admin.posts.restore',$post->id)}}">
                                        <i class="fa fa-undo"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm"
                                            onclick="deletePost('{{$post->id}}',this)">
                                        <i class="fas fa-times">
                                        </i>
                                        Delete
                                    </button>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No Data Found</td>
                            </tr>
                        @endforelse


                        </tbody>
                    </table>

                </div>
                <div class="paginate">{{$posts->links()}}</div>
                <!-- /.card-body -->

            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function deletePost(id, reference) {
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
            axios.get(`/admin/posts/${id}/forceDelete`).then((response) => {
                reference.closest('tr').remove();
                toastr.success(response.data.message);
            }).catch((error) => {
                console.log(error.response.data.message);
                toastr.error(error.response.data.message);
            });
        }
    </script>
@endsection
