@extends('frontsite.dashboard-user.master')
@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Checkout</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pricing Plans</a></li>
                            <li>Checkout</li>
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
            <div class="fun-facts-container">
                <div class="fun-fact" data-fun-fact-color="#36bd78">
                    <div class="fun-fact-text">
                        <span>Total Balance</span>
                        <h4>{{Auth::user()->wallet}}</h4>
                    </div>
                    <div class="fun-fact-icon" style="background-color: rgba(54, 189, 120, 0.07);"><i class="icon-material-outline-money" style="color: rgb(54, 189, 120);"></i></div>
                </div>
                <div class="fun-fact" data-fun-fact-color="#b81b7f">
                    <div class="fun-fact-text">
                        <span>Withdrawable Balance</span>
                        <h4>0</h4>
                    </div>
                    <div class="fun-fact-icon" style="background-color: rgba(184, 27, 127, 0.07);"><i class="icon-material-outline-money" style="color: rgb(184, 27, 127);"></i></div>
                </div>
                <div class="fun-fact" data-fun-fact-color="#efa80f">
                    <div class="fun-fact-text">
                        <span>Pending Balance</span>
                        <h4>0</h4>
                    </div>
                    <div class="fun-fact-icon" style="background-color: rgba(239, 168, 15, 0.07);"><i class="icon-material-outline-money" style="color: rgb(239, 168, 15);"></i></div>
                </div>

                <!-- Last one has to be hidden below 1600px, sorry :( -->
                <div class="fun-fact" data-fun-fact-color="#2a41e6">
                    <div class="fun-fact-text">
                        <span>This Month Views</span>
                        <h4>987</h4>
                    </div>
                    <div class="fun-fact-icon" style="background-color: rgba(42, 65, 230, 0.07);"><i class="icon-material-outline-money" style="color: rgb(42, 65, 230);"></i></div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 content-right-offset">
                @if (Session::has('error'))
                    <span style="color: red; ">{{ Session::get('error') }}</span>
                @endif
                <form action="{{route('user.payment')}}" method="post">
                    @csrf

                <div class="col-xl-6 col-md-6">
                    <div class="section-headline margin-top-25 margin-bottom-12">
                        <h5>Enter Amount</h5>
                    </div>
                    <input placeholder="Amount" id="amount" name="amount">
                </div>

                <!-- Hedline -->
                <h3 class="margin-top-25">Payment Method</h3>

                <!-- Payment Methods Accordion -->
                <div class="payment margin-top-30">

                    <div class="payment-tab payment-tab-active">
                        <div class="payment-tab-trigger">
                            <input checked id="paypal" name="cardType" type="radio" value="paypal">
                            <label for="paypal">PayPal</label>
                            <img class="payment-logo paypal" src="https://i.imgur.com/ApBxkXU.png" alt="">
                        </div>

                        <div class="payment-tab-content">
                            <p>You will be redirected to PayPal to complete payment.</p>
                        </div>
                    </div>


                    <div class="payment-tab">
                        <div class="payment-tab-trigger">
                            <input type="radio" name="cardType" id="creditCart" value="creditCard">
                            <label for="creditCart">Credit / Debit Card</label>
                            <img class="payment-logo" src="https://i.imgur.com/IHEKLgm.png" alt="">
                        </div>

                        <div class="payment-tab-content">
                            <div class="row payment-form-row">

                                <div class="col-md-6">
                                    <div class="card-label">
                                        <input id="nameOnCard" name="nameOnCard"  type="text" placeholder="Cardholder Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-label">
                                        <input id="cardNumber" name="cardNumber" placeholder="Credit Card Number"  type="text">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card-label">
                                        <input id="expiryMonth" name="expiryMonth" placeholder="Expiry Month"  type="text">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card-label">
                                        <label for="expiryYear">Expiry Year</label>
                                        <input id="expiryYear" name="expiryYear" placeholder="Expiry Year"  type="text">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card-label">
                                        <input id="cvv" name="cvv"  type="text" placeholder="CVV">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- Payment Methods Accordion / End -->

                <button type="submit" class="button big ripple-effect margin-top-40 margin-bottom-65">Proceed Payment</button>
                </form>
            </div>


        </div>
    </div>
    <!-- Container / End -->
@endsection
