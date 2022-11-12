@extends('admin.master')


@section('title','')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-2">
                    <a href="{{route('invoiceFile.pdf',$invoice)}}" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </a>
                </div>
                <div class="col-2">
                    <a href="{{route('invoice.print',$invoice)}}" class="btn btn-info">
                        <i class="fas fa-file"></i> Print
                    </a>
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
                                        <input type="text" id="invoice_number" name="invoice_number" disabled
                                               class="form-control @error('user_name') is-invalid @enderror"
                                               value="{{old('invoice_number',$invoice->invoice_number)}}">
                                        @error('invoice_number')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="title">User name</label>
                                        <input type="text" id="user_name" name="user_name" disabled
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
                                        <input type="text" id="user_mobile" name="user_mobile" disabled
                                               class="form-control @error('user_mobile') is-invalid @enderror"
                                               value="{{old('user_mobile',$invoice->user_mobile)}}">
                                        @error('user_mobile')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="title">User Email</label>
                                        <input type="email" id="user_email" name="user_email" disabled
                                               class="form-control @error('user_email') is-invalid @enderror"
                                               value="{{old('user_email',$invoice->user_email)}}">
                                        @error('user_email')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="title">Invoice Date</label>
                                        <input type="text" id="user_name" name="user_name" disabled
                                               class="form-control @error('user_name') is-invalid @enderror"
                                               value="{{old('user_name',$invoice->created_at)}}">
                                        @error('user_name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="title">Total Price</label>
                                        <input type="text" id="user_mobile" name="user_mobile" disabled
                                               class="form-control @error('user_mobile') is-invalid @enderror"
                                               value="{{old('user_mobile',$invoice->invoice_details()->sum('sub_total_price'))}}$">
                                        @error('user_mobile')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                            </div>


                        </div>

                        <!-- /.card-body -->
                        <div class="table-responsive">
                            <h3>Items</h3>
                            <table class="invoice_details_table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item name</th>
                                    <th>Item price</th>
                                    <th>Item quantity</th>
                                    <th>Sub Total</th>
                                </tr>
                                </thead>
                                <tbody id="item_table">
                                @foreach($invoice->invoice_details as $detail)
                                    <tr>
                                        <td style="width: 5%"> {{$loop->iteration}}</td>
                                        <td>
                                            <input type="text" id="item_name" name="item_name" class="form-control"
                                                   value="{{$detail->item_name}}" disabled>
                                        </td>
                                        <td>
                                            <input type="number" id="item_price" name="item_price"
                                                   class="form-control" value="{{$detail->item_price}}" disabled>
                                        </td>
                                        <td>
                                            <input type="number" id="quantity" name="quantity" class="form-control"
                                                   value="{{$detail->quantity}}" disabled>
                                        </td>
                                        <td>
                                            <input type="number" id="sub_total_price" name="sub_total_price"
                                                   class="form-control" disabled value="{{$detail->sub_total_price}}">
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <hr>

                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

            </div>


            <form>

            </form>
        </div>

    </section>
@endsection


