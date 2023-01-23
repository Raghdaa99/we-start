@extends('frontsite.master')

@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Contact</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="{{ url("#") }}">Home</a></li>
                            <li><a href="{{ url("#") }}">Pages</a></li>
                            <li>Contact</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->


    <!-- Container -->
    <div class="container">
        <div class="row">

            <div class="col-xl-12">
                <div class="contact-location-info margin-bottom-50">
                    <div class="contact-address">
                        <ul>
                            <li class="contact-address-headline">Our Office</li>
                            <li>425 Berry Street, CA 93584</li>
                            <li>Phone (123) 123-456</li>
                            <li><a href="{{ url("#") }}">mail@example.com</a></li>
                            <li>
                                <div class="freelancer-socials">
                                    <ul>
                                        <li><a href="{{ url("#") }}" title="Dribbble" data-tippy-placement="top"><i class="icon-brand-dribbble"></i></a></li>
                                        <li><a href="{{ url("#") }}" title="Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
                                        <li><a href="{{ url("#") }}" title="Behance" data-tippy-placement="top"><i class="icon-brand-behance"></i></a></li>
                                        <li><a href="{{ url("#") }}" title="GitHub" data-tippy-placement="top"><i class="icon-brand-github"></i></a></li>

                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <div id="single-job-map-container">
                        <div id="singleListingMap" data-latitude="37.777842" data-longitude="-122.391805" data-map-icon="im im-icon-Hamburger"></div>
                        <a href="{{ url("#") }}" id="streetView">Street View</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2">

                <section id="contact" class="margin-bottom-60">
                    <h3 class="headline margin-top-15 margin-bottom-35">Any questions? Feel free to contact us!</h3>

                    <form action="{{route('send-contact')}}" method="post" name="contactform" id="contactform" autocomplete="on" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-with-icon-left">
                                    <input class="with-border" name="name" type="text" id="name" placeholder="Your Name" required="required" />
                                    <i class="icon-material-outline-account-circle"></i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-with-icon-left">
                                    <input class="with-border" name="email" type="email" id="email" placeholder="Email Address" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
                                    <i class="icon-material-outline-email"></i>
                                </div>
                            </div>
                        </div>

                        <div class="input-with-icon-left">
                            <input class="with-border" name="subject" type="text" id="subject" placeholder="Subject" required="required" />
                            <i class="icon-material-outline-assignment"></i>
                        </div>

                        <div>
                            <textarea class="with-border" name="comments" cols="40" rows="5" id="comments" placeholder="Message" spellcheck="true" required="required"></textarea>
                        </div>

                        <input type="submit" class="submit button margin-top-15" id="submit" value="Submit Message" />

                    </form>
                </section>

            </div>

        </div>
    </div>
    <!-- Container / End -->
@endsection

@section('scripts')
    <!-- Google API & Maps -->
    <!-- Geting an API Key: https://developers.google.com/maps/documentation/javascript/get-api-key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>
    <script src="{{ asset("/assets/frontsite/js/infobox.min.js") }}"></script>
    <script src="{{ asset("/assets/frontsite/js/markerclusterer.js") }}"></script>
    <script src="{{ asset("/assets/frontsite/js/maps.js") }}"></script>

    <script >

        $('#contactform').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            let data = new FormData(this);
            let url = form.attr('action');
            $.ajax({
                type: "post",
                url,
                data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    console.log(res.message)
                    toastr.success(res.message);
                    resetForm();
                },
                error: function(data) {
                    let errors = data.responseJSON;
                    toastr.error(errors.message);
                    console.log(errors)
                },
            });

        });
        function resetForm()
        {
            $('#contactform')[0].reset();
        }
    </script>

@endsection
