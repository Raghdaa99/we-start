<script setup>

import {onMounted, ref, watch} from "vue";

let props = defineProps(
    {
        currentRecipiet: Number
    }
);

// const recipient_id = ref(props.currentRecipiet);

// console.log(props)

const sendMessage = () => {
    axios.post('http://127.0.0.1:8000/api/messages/store', {
        'message': 'dj'
    })
        .then((res) => {
            console.log('nnn')
        }).catch((error) => {

    });
}

// onMounted(e => {
//     if (props.currentRecipiet !== -1) {
//         getMessages()
//
//     }
// })

// const getMessages = () => {
//     axios.get(`http://127.0.0.1:8000/api/messages-content/${recipient_id.value}`)
//         .then((res) => {
//
//         }).catch((error) => {
//
//     });
// }

// let current_user = props.currentRecipiet;
// console.log(current_user)


</script>
<template>

    <!-- Message Content -->
    <div class="message-content">

        <div class="messages-headline">
            <h4>Sindy Forest</h4>
            <a href="" class="message-action"><i class="icon-feather-trash-2"></i> Delete
                Conversation</a>
        </div>


        <!-- Message Content Inner -->
        <div class="message-content-inner">

            <!-- Time Sign -->
            <div class="message-time-sign">
                <span>28 June, 2018</span>
            </div>

            <div class="message-bubble me">
                <div class="message-bubble-inner">
                    <div class="message-avatar"><img
                        src="" alt=""/>
                    </div>
                    <div class="message-text"><p>Thanks for choosing my offer. I will start working on your
                        project tomorrow.</p></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="message-bubble">
                <div class="message-bubble-inner">
                    <div class="message-avatar"><img
                        src="" alt=""/>
                    </div>
                    <div class="message-text"><p>Great. If you need any further clarification let me know.
                        👍</p></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="message-bubble me">
                <div class="message-bubble-inner">
                    <div class="message-avatar"><img
                        src="" alt=""/>
                    </div>
                    <div class="message-text"><p>Ok, I will. 😉</p></div>
                </div>
                <div class="clearfix"></div>
            </div>


        </div>
        <!-- Message Content Inner / End -->

        <form action="#" method="post" @submit.prevent="sendMessage">
            <!-- Reply Area -->
            <div class="message-reply">
                <textarea cols="1" rows="1" placeholder="Your Message" data-autoresize></textarea>
                <button class="button ripple-effect">Send</button>
            </div>
        </form>


    </div>
    <!-- Message Content -->
</template>


<style>

</style>
