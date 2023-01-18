<!--  User Notifications -->
<div class="header-widget hide-on-mobile">

    <!-- Notifications -->
    <div class="header-notifications">

        <!-- Trigger -->
        <div class="header-notifications-trigger">
            <a href="{{ url("#") }}"><i class="icon-feather-bell"></i><span id="newNotifications">{{ $count }}</span></a>
        </div>

        <!-- Dropdown -->
        <div class="header-notifications-dropdown">

            <div class="header-notifications-headline">
                <h4>Notifications</h4>
                <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
                    <i class="icon-feather-check-square"></i>
                </button>
            </div>

            <div class="header-notifications-content">
                <div class="header-notifications-scroll" data-simplebar>
                    <ul id="notificationsList">
                    @foreach ($notifications as $notification)
                        <!-- Notification -->
                            <li class="notifications-not-read">
                                <a href="{{ $notification->data['url'] }}?notify_id={{ $notification->id }}">
                                <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                <span class="notification-text">
                                    @if($notification->unread())
                                        <strong>*</strong>
                                    @endif
                                    {{ $notification->data['body'] }}
                                </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

    </div>

    <!-- Messages -->
    <div class="header-notifications">
        <div class="header-notifications-trigger">
            <a href="{{ url("#") }}"><i class="icon-feather-mail"></i><span>3</span></a>
        </div>

        <!-- Dropdown -->
        <div class="header-notifications-dropdown">

            <div class="header-notifications-headline">
                <h4>Messages</h4>
                <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
                    <i class="icon-feather-check-square"></i>
                </button>
            </div>

            <div class="header-notifications-content">
                <div class="header-notifications-scroll" data-simplebar>
                    <ul>
                        <!-- Notification -->
                        <li class="notifications-not-read">
                            <a href="{{ url("dashboard-messages.html") }}">
                                <span class="notification-avatar status-online"><img src="{{ asset("/assets/frontsite/images/user-avatar-small-03.jpg") }}" alt=""></span>
                                <div class="notification-text">
                                    <strong>David Peterson</strong>
                                    <p class="notification-msg-text">Thanks for reaching out. I'm quite busy right now on many...</p>
                                    <span class="color">4 hours ago</span>
                                </div>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>

            <a href="{{ url("dashboard-messages.html") }}" class="header-notifications-button ripple-effect button-sliding-icon">View All Messages<i class="icon-material-outline-arrow-right-alt"></i></a>
        </div>
    </div>

</div>
<!--  User Notifications / End -->
