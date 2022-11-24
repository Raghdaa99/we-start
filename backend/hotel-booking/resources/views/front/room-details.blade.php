@extends('front.master')

@section('content')
    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            @error('user_name')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            @if($errors->any())
                <div class="alert alert-danger">
{{--                    @dump($errors->all())--}}
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error')}}
                </div>
            @endif

            <div class="row">

                <div class="col-lg-8">
                    <div class="room-details-item">
                       <div>
                           <img src="{{ asset('uploads/'.$hotel->images[0]->path) }}" alt="" width="100%">
                       </div>
                        @foreach($hotel->images as $image)
                            <img src="{{asset('uploads/'.$image->path)}}" alt="" width="100" height="100"/>
                        @endforeach
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>{{$hotel->name}}</h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    {{--                                    <a href="{{ url("#") }}">Booking Now</a>--}}
                                </div>
                            </div>
                            <h2>{{$hotel->price}}$<span>/Pernight</span></h2>
                            <p class="f-para">{{ $hotel->desc }}</p>

                            {{--                            <table>--}}
                            {{--                                <tbody>--}}
                            {{--                                <tr>--}}
                            {{--                                    <td class="r-o">Size:</td>--}}
                            {{--                                    <td>30 ft</td>--}}
                            {{--                                </tr>--}}
                            {{--                                <tr>--}}
                            {{--                                    <td class="r-o">Capacity:</td>--}}
                            {{--                                    <td>Max persion 5</td>--}}
                            {{--                                </tr>--}}
                            {{--                                <tr>--}}
                            {{--                                    <td class="r-o">Bed:</td>--}}
                            {{--                                    <td>King Beds</td>--}}
                            {{--                                </tr>--}}
                            {{--                                <tr>--}}
                            {{--                                    <td class="r-o">Services:</td>--}}
                            {{--                                    <td>Wifi, Television, Bathroom,...</td>--}}
                            {{--                                </tr>--}}
                            {{--                                </tbody>--}}
                            {{--                            </table>--}}

                        </div>
                    </div>
                    <div class="rd-reviews">
                        <h4>Reviews</h4>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="{{ asset("/assets/front/img/room/avatar/avatar-1.jpg") }}" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="{{ asset("/assets/front/img/room/avatar/avatar-2.jpg") }}" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-add">
                        <h4>Add Review</h4>
                        <form action="#" class="ra-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name*">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email*">
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <h5>You Rating:</h5>
                                        <div class="rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star-half_alt"></i>
                                        </div>
                                    </div>
                                    <textarea placeholder="Your Review"></textarea>
                                    <button type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="room-booking">
                        <h3>Your Reservation</h3>
                        <form action="{{route('bookings.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="user_name">User Name</label>
                                <input type="text" class="form-control" name="user_name" value="{{old('user_name')}}">
                                @error('user_name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="user_mobile">User Phone</label>
                                <input type="text" class="form-control" name="user_mobile" value="{{old('user_mobile')}}">
                                @error('user_mobile')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="user_email">User Email</label>
                                <input type="email" class="form-control" name="user_email" value="{{old('user_email')}}">
                                @error('user_email')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input" id="date-in" name="start_date" value="{{old('start_date')}}">
                                <i class="icon_calendar"></i>
                                @error('start_date')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" id="date-out" name="end_date" value="{{old('end_date')}}">
                                <i class="icon_calendar"></i>
                                @error('end_date')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="guest">Guests:</label>
                                <input type="number" class="form-control" name="number_guests"
                                       value="{{old('number_guests')}}">
                                @error('number_guests')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="notes">Notes:</label>
                                <textarea class="form-control" name="notes" rows="3">
                                    {{old('notes')}}
                                </textarea>
                            </div>
                            <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                            <button class="bk-btn" type="submit">Booking Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->
@endsection
