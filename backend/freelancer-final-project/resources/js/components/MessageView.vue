<script setup>
// import ListUsers from "./ListUsers.vue";
import {onMounted, ref, watch} from "vue";

const users = ref();
const currentRecipiet = ref(-1);
const messages = ref();
const body = ref('');
const username = ref('');

// console.log('currentRecipiet')
const getUsers = () => {
    axios.get('http://127.0.0.1:8000/user/users')
        .then(res => {
            users.value = res.data.data;
            console.log(res.data.data)
        })
}

onMounted(e => {
    getUsers();
})

const changeContent = (user_id,name) => {

    currentRecipiet.value = user_id;
    username.value = name;
}

watch(currentRecipiet, (currentValue, oldValue) => {
    if (currentValue !== oldValue) {
        getMessages()
        // console.log(currentValue);
        // console.log(oldValue);
    }
});

const getMessages = () => {
    axios.get(`http://127.0.0.1:8000/user/messages-content/${currentRecipiet.value}`)
        .then((res) => {
            messages.value = res.data.data
        }).catch((error) => {

    });
}

const sendMessage = () => {
    axios.post('http://127.0.0.1:8000/user/messages/store', {
        'body': body.value,
        'recipient_id': currentRecipiet.value
    })
        .then((res) => {
            getMessages()
            body.value = ''
        }).catch((error) => {

    });
}
</script>

<template>
    <div class="messages-container-inner">

        <!-- Messages -->
        <div class="messages-inbox">
            <div class="messages-headline">
                <div class="input-with-icon">
                    <input id="autocomplete-input" type="text" placeholder="Search">
                    <i class="icon-material-outline-search"></i>
                </div>
            </div>

            <ul>

                <!--                class="active-message"-->
                <li v-for="user in users" :class="{ 'active-message': user.user_id === currentRecipiet }">
                    <a @click="changeContent(user.user_id,user.username)">
                        <div class="message-avatar"><i class="status-icon status-offline"></i><img
                            :src="user.image_url" alt=""/>
                        </div>

                        <div class="message-by">
                            <div class="message-by-headline">
                                <h5>{{ user.username }}</h5>
<!--                                <span>Yesterday</span>-->
                            </div>
                            <p>{{ user.messages.body }}</p>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Messages / End -->
        <!--        <message-content :currentRecipiet="currentRecipiet"></message-content>-->

        <!-- Message Content -->
        <div v-if="currentRecipiet !== -1" class="message-content">

            <div class="messages-headline">
                <h4>{{username}}</h4>
                <a href="" class="message-action"><i class="icon-feather-trash-2"></i> Delete
                    Conversation</a>
            </div>


            <div class="message-content-inner">


                <!-- Time Sign -->
                <div class="message-time-sign">
                    <span></span>
                </div>


                <div v-for="message in messages"
                     :class="message.user_id === currentRecipiet ?'message-bubble' : 'message-bubble me'">
                    <div class="message-bubble-inner">
                        <div class="message-avatar"><img :src="message.image_url" alt=""></div>
                        <div class="message-text"><p>{{ message.body }}</p></div>
                    </div>
                    <div class="clearfix"></div>
                </div>


            </div>

            <!-- Message Content Inner / End -->

            <form action="#" ref="form" method="post" @submit.prevent="sendMessage">
                <!-- Reply Area -->
                <div class="message-reply">
                    <textarea cols="1" rows="1" name="body" v-model="body" placeholder="Your Message"
                              data-autoresize></textarea>
                    <button class="button ripple-effect">Send</button>
                </div>
            </form>


        </div>
        <!-- Message Content -->


    </div>
</template>


<style scoped>

</style>
