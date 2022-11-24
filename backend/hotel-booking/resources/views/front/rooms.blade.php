@extends('front.master')
@section('content')
    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @forelse($hotels as $hotel)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('uploads/'.$hotel->images[0]->path) }}" alt="" height="300">
                        <div class="ri-text">
                            <h4>{{$hotel->name}}</h4>
                            <h3>{{$hotel->price}}$<span>/Pernight</span></h3>

                            <a href="{{ route('details',$hotel->id) }}" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No Hotels Found</td>
                    </tr>
                @endforelse

                <div class="col-lg-12">
                    <div class="room-pagination">
                        {{$hotels->links()}}
{{--                        <a href="{{ url("#") }}">1</a>--}}
{{--                        <a href="{{ url("#") }}">2</a>--}}
{{--                        <a href="{{ url("#") }}">Next <i class="fa fa-long-arrow-right"></i></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

@endsection
