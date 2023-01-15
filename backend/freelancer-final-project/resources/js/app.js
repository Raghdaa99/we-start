import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

Echo.private('App.Models.User.'+ userId)
    .notification((notification) => {
        console.log(notification.type);
        toastr.success('success uploaded');
        $('#notificationsList').prepend(`<li class="notifications-not-read">
            <a href="${data.url}?notify_id=${data.id}">
                <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                <span class="notification-text">
                    <strong>*</strong>
                    ${data.body}
                </span>
            </a>
        </li>`);
        let count = Number($('#newNotifications').text())
        count++;
        if (count > 99) {
            count = '99+';
        }

    });

console.log('ss jiidj ');
