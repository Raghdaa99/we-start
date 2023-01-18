import './bootstrap';

import Alpine from 'alpinejs';
import {createApp} from "vue";
import MessageView from "./components/MessageView.vue";
// import MessageContent from "./components/MessageContent.vue";
// import ListUsers from "./components/ListUsers.vue";

window.Alpine = Alpine;

Alpine.start();
// vue/dist/vue.esm-bundler
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

const app = createApp(MessageView);
// app.component('MessageContent',MessageContent)
// app.component('ListUsers',ListUsers)
app.mount('#app');

