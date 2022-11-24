@extends('admin.master')


@section('title','')

@section('styles')
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Invoices</h3>

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
                                Hotel name
                            </th>

                            <th style="width: 30%">
                               Images
                            </th>

                            <th style="width: 8%">
                               Price
                            </th>
                            <th style="width: 8%">
                                Created Date
                            </th>

                            <th style="width: 20%">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($hotels as $hotel)
                            <tr>
                                <td>
                                    {{ $hotel->id}}
                                </td>
                                <td>
                                    <a>
                                        {{$hotel->name}}
                                    </a>
                                    <br>
                                </td>
                                <td >
                                    @foreach($hotel->images as $image)
                                        <img src="{{asset('uploads/'.$image->path)}}" alt="" width="80" height="80"/>
                                    @endforeach
                                </td>
                                <td>
                                    <a>
                                        {{$hotel->price}}
                                    </a>
                                    <br>
                                </td>
                                <td>
                                    <small>
                                        {{$hotel->created_at}}
                                    </small>
                                </td>

                                <td class="project-actions">

                                    <a type="button" class="btn btn-info btn-sm"
                                       href="{{route('hotels.edit',$hotel->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm"
                                            onclick="deleteHotel('{{$hotel->id}}',this)">
                                        <i class="fas fa-trash">
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
                <!-- /.card-body -->

            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function deleteHotel(id, reference) {
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
            axios.delete(`/hotels/${id}`).then((response) => {
                reference.closest('tr').remove();
                toastr.success(response.data.message);
            }).catch((error) => {
                console.log(error.response.data.message);
                toastr.error(error.response.data.message);
            });
        }
    </script>
@endsection
