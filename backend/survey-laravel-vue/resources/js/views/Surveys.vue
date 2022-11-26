<template>
    <PageComponent>
        <template v-slot:header>
            <div class="wrapper-head">
                <h1> Surveys</h1>
                <router-link :to="{ name: 'SurveyCreate' }">
                    Add New Survey
                </router-link>
            </div>

        </template>
        <div class="surveys-List">

            <SurveyListItem v-for="(survey, index) in surveys" :key="survey.id" :survey="survey"
                            @delete="deleteSurvey"
            >
            </SurveyListItem>


        </div>
    </PageComponent>
</template>

<script setup>
import PageComponent from "../components/PageComponent.vue";
import SurveyListItem from "../components/SurveyListItem.vue";
// import { useUserStore } from "../stores";
// import { computed } from "@vue/reactivity";
import {ref, onMounted} from "vue";
import axiosClient from "../axios";


const surveys = ref('');

// const surveysarr = mou(()=> su)
// function deleteSurvey(survey) {
//   if (confirm('Are you sure to delete')) {

//   }
// }

const deleteSurvey = (survey_id) => {
    axiosClient.delete('/survey/'+survey_id).then(function (response) {
        console.log(response)
        getSurveys();
    }).catch(function (error) {
        console.log(error)
    });
}
const getSurveys = () => {
    axiosClient.get("survey")
        .then((res) => {
            surveys.value = res.data.data;
            // console.log(res.data.data);
        });
};

onMounted(() => {

    getSurveys();
    // surveys.value = [
    //     {
    //         id: 1,
    //         title: "ssss",
    //         status: false,
    //         description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error optio tempore dicta culpa, nobis delectus Accusantium nesciunt corrupti iusto optio!",
    //         image: "https://picsum.photos/id/1/400/300",
    //         image_url: null,
    //         expire_date: "2022-10-5",
    //         questions: [
    //             {
    //                 id: 1,
    //                 type: "select",
    //                 question: "fjfjjjjjjjj",
    //                 description: null,
    //                 data: {
    //                     "options":[
    //                         {
    //                             uuid :"dffjff-fjffjf-kfkoeenn",
    //                             text:"Gaza"
    //                         },
    //                         {
    //                             uuid :"dffjff-fjffjf-cdddik",
    //                             text:"dddd"
    //                         },
    //                         {
    //                             uuid :"dffjff-fjffjf-dkdkwp",
    //                             text:"Gwwwaza"
    //                         },
    //                     ]
    //                 }
    //             }
    //
    //         ],
    //     },
    //     {
    //         id: 2,
    //         title: "dsss",
    //         status: false,
    //         description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error optio tempore dicta culpa, nobis delectus Accusantium nesciunt corrupti iusto optio!",
    //         image: "https://picsum.photos/id/1/400/300",
    //         image_url: null,
    //         expire_date: "2022-10-5",
    //         questions: [],
    //     },
    //     {
    //         id: 3,
    //         title: "rrrr",
    //         status: false,
    //         description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error optio tempore dicta culpa, nobis delectus Accusantium nesciunt corrupti iusto optio!",
    //         image: "https://picsum.photos/id/1/400/300",
    //         image_url: null,
    //         expire_date: "2022-10-5",
    //         questions: [],
    //     },
    // ]
})
</script>

<style scoped>
.wrapper-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.wrapper-head h1 {
    margin: 0;
}

.wrapper-head a {
    background-color: var(--main-color);
    color: #fff;
    padding: 10px;
    border-radius: 10px;
}

.surveys-List {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}
</style>
