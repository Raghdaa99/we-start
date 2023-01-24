@extends('admin.master')


@section('title','')

@section('styles')
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$count_projects}}</h3>

                            <p>Jobs Posted</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                {{number_format(Auth::user()->wallet, 2, '.', '')}}<sup style="font-size: 20px">$</sup>
                            </h3>

                            <p>Total Balance</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$freelancers->count()}}</h3>

                            <p>Freelancers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$count_clients}}</h3>

                            <p>Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-12">
                    <h3>All Freelancers</h3>
                    <a class="btn btn-primary" href="{{route('admin.send.email')}}">Send Email
                        <i class="fa fa-envelope"></i>
                    </a>
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <div>
                        <table class="table table-bordered ">
                            <thead>
                            <tr class="bg-dark text-white">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Image</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($freelancers as $freelancer)
                                <tr>
                                    <td>{{ $freelancer->id }}</td>
                                    <td>{{ $freelancer->name }}</td>
                                    <td>{{ $freelancer->email }}</td>
                                    <td>{{ $freelancer->profile->title }}</td>

                                    <td><img width="70" src="{{$freelancer->image_url}}" alt="">
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $freelancers->links() }}
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
@endsection
