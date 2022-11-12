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
                                Invoice Number
                            </th>
                            <th style="width: 8%">
                                User Name
                            </th>

                            <th style="width: 8%">
                                User Phone
                            </th>

                            <th style="width: 8%">
                                Created at
                            </th>

                            <th style="width: 20%">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($invoices as $invoice)
                            <tr>
                                <td>
                                    {{ $invoice->id}}
                                </td>
                                <td>
                                    <a>
                                        {{$invoice->invoice_number}}
                                    </a>
                                    <br>
                                </td>
                                <td>
                                    <a>
                                        {{$invoice->user_name}}
                                    </a>
                                    <br>
                                </td>
                                <td>
                                    <a>
                                        {{$invoice->user_mobile}}
                                    </a>
                                    <br>
                                </td>

                                <td>
                                    <small>
                                        {{$invoice->created_at}}
                                    </small>
                                </td>

                                <td class="project-actions">

                                    <a type="button" class="btn btn-success btn-sm"
                                       href="{{route('invoices.show',$invoice->id)}}">
                                        <i class="fa fa-eye"></i>
                                        Show
                                    </a>
                                    <a type="button" class="btn btn-info btn-sm"
                                       href="{{route('invoices.edit',$invoice->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm"
                                            onclick="deleteInvoice('{{$invoice->id}}',this)">
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
        function deleteInvoice(id, reference) {
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
            axios.delete(`/invoices/${id}`).then((response) => {
                reference.closest('tr').remove();
                toastr.success(response.data.message);
            }).catch((error) => {
                console.log(error.response.data.message);
                toastr.error(error.response.data.message);
            });
        }
    </script>
@endsection
