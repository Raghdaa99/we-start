@extends('admin.master')


@section('title','')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('content')
  
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('invoices.update',$invoice)}}" method="post" enctype="multipart/form-data"
                  id="idForm">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Save" class="btn btn-info" id="idForm">
                    </div>
                </div>
                <br>
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
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="title">Invoice Number</label>
                                            <span class="form-control bg-gradient-gray">
                                                {{old('invoice_number',$invoice->invoice_number)}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="title">Invoice Date</label>
                                            <span class="form-control bg-gradient-gray">
                                                {{old('user_name',$invoice->created_at)}}
                                            </span>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="title">User name</label>
                                            <input type="text" id="user_name" name="user_name"
                                                   class="form-control @error('user_name') is-invalid @enderror"
                                                   value="{{old('user_name',$invoice->user_name)}}">
                                            @error('user_name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="title">User Phone</label>
                                            <input type="number" id="user_mobile" name="user_mobile"
                                                   class="form-control @error('user_mobile') is-invalid @enderror"
                                                   value="{{old('user_mobile',$invoice->user_mobile)}}">
                                            @error('user_mobile')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="title">User Email</label>
                                            <input type="email" id="user_email" name="user_email"
                                                   class="form-control @error('user_email') is-invalid @enderror"
                                                   value="{{old('user_email',$invoice->user_email)}}">
                                            @error('user_email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <div class="table-responsive">
                                    <button type="button" class="btn btn-success add" id="add_item" onclick="addItem()">
                                        <i class="fas fa-plus"></i>
                                        Add Another Item
                                    </button>
                                    <table class="invoice_details_table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item name</th>
                                            <th>Item price</th>
                                            <th>Item quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody id="item_table">
                                        @foreach($invoice->invoice_details as $detail)
                                            <tr>
                                                <td style="width: 5%"> #</td>
                                                <td>
                                                    <input type="text" id="item_name[]" name="item_name[]"
                                                           class="form-control"
                                                           value="{{$detail->item_name}}">
                                                </td>
                                                <td>
                                                    <input type="number" id="item_price[]" name="item_price[]"
                                                           class="form-control" value="{{$detail->item_price}}">
                                                </td>
                                                <td>
                                                    <input type="number" id="quantity[]" name="quantity[]"
                                                           class="form-control"
                                                           value="{{$detail->quantity}}">
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-danger"
                                                            onclick="removeItem(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <hr>

                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->


                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </form>

            <form>

            </form>
        </div>

    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        let table = document.querySelector('.invoice_details_table tbody');
        let count = 1;

        function add_inputs_fields(count) {
            let content = '';

            content += '<tr>';
            content += `<td>#</td>`;

            content += `<td>
                <input type="text" id="item_name[]" name="item_name[]"  class="item_name form-control" required>
         </td>`;

            content += `<td>
                <input type="number" id="item_price[]" name="item_price[]" value="0" class="item_price form-control" required>
            </td>`;

            content += `<td>
                <input type="number" id="quantity[]" name="quantity[]" value ="1" class="quantity form-control" required>
            </td>`;


            let trash_btn = '';
            // if (count > 1) {
            trash_btn += `
            <button type="button" class="btn btn-danger" onclick="removeItem(this)">
                <i class="fas fa-trash"></i>
            </button>
            `;
            // }

            content += `<td>${trash_btn}</td></tr>`;

            return content;
        }

        function addItem() {
            table.insertAdjacentHTML('beforeend', add_inputs_fields(++count));
        }

        function removeItem(reference) {
            reference.closest('tr').remove();
        }

        $("#idForm").submit(function (e) {

            e.preventDefault();

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "PUT",
                url: actionUrl,
                data: form.serialize(),
                success: function (responseText, status, xhr, myForm) {
                    console.log(responseText.message)
                    toastr.success(responseText.message);
                    window.location.href = "http://127.0.0.1:8000/invoices";
                },
                error: function (data) {
                    let errors = data.responseJSON;
                    toastr.error(errors.message);
                    console.log(errors)
                },
            });

        });

    </script>
@endsection
