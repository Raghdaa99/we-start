@extends('frontsite.dashboard-user.master')
@section('content')
    <!-- Dashboard Content
	================================================== -->


    <!-- Dashboard Headline -->
    <div class="dashboard-headline">
        <h3>Messages</h3>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs" class="dark">
            <ul>
                <li><a href="{{ url("#") }}">Home</a></li>
                <li><a href="{{ url("#") }}">Dashboard</a></li>
                <li>Messages</li>
            </ul>
        </nav>
    </div>

    <div id="app" class="messages-container margin-top-0">

 <MessageView ></MessageView>
    </div>
    <!-- Messages Container / End -->

    <!-- Dashboard Content / End -->
@endsection

