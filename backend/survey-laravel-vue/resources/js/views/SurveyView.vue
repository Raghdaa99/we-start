<template>
    <PageComponent>
        <template v-slot:header>
            <h1>{{ route.params.id ? model.title : "Create a Survey" }} </h1>
        </template>
        <form @submit.prevent="saveSurvey">
            <section class="content">
                <div class="row">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" id="" v-model="model.title" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Description</label>
                                <textarea name="description" id="description" cols="30" rows="5"
                                          v-model="model.description"
                                          class="form-control">

                            </textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Expire Date</label>
                                <input type="date" name="expire_date" id="expire_date" v-model="model.expire_date"
                                       @change="onDateChange" class="form-control"
                                       >
                            </div>

                            <div class="form-group mb-3">
                                <label for="status">Active</label>
                                <input type="checkbox" id="status" name="status" v-model="model.status" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                           @change="onImageChoose">
                                    <label class="custom-file-label" for="exampleInputFile">Change</label>
                                </div>
                                <img v-if="model.image_url" :src="model.image_url" :alt="model.title" width="300">
                            </div>

                            <div class="questions-content mb-3">
                                <div class="questions mb-3 d-flex align-items-center">
                                    <h3>Questions</h3>
                                    <button class="btn btn-success m-lg-3" @click.prevent="addQuestion">
                                        <i class="fa fa-add"></i>
                                        Add Question
                                    </button>
                                </div>
                                <p v-if="model.questions.length < 1">
                                    You dont have Questions
                                </p>
                                <div class="questions-items" v-for="(question, index) in model.questions"
                                     :key="question.id">
                                    <QuestionEditor :question="question" :index="index" @change="questionChange"
                                                    @addQuestion="addQuestion"
                                                    @deleteQuestion="deleteQuestion">

                                    </QuestionEditor>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary"> Create new Survey</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </section>
        </form>
        {{model.questions}}
    </PageComponent>

</template>

<script setup>
import PageComponent from "../components/PageComponent.vue";
import {useRoute, useRouter} from 'vue-router';
import {ref} from "vue";
import QuestionEditor from "../components/editor/QuestionEditor.vue";
import {v4 as uuidv4} from "uuid";
import axiosClient from "../axios";


const route = useRoute();
const router = useRouter();


let model = ref({
    title: "ddds",
    status: false,
    description: null,
    image: '',
    image_url: null,
    expire_date: '',
    questions: [],
})
if (route.params.id) {
    axiosClient.get(`survey/${route.params.id}`).then(function (response) {
        // console.log(response.data.data)
        model.value = response.data.data;
        model.value.image_url = response.data.data.image;
        model.value.expire_date = response.data.data.expire_date;
        model.value.questions = response.data.data.questions;
        console.log(response.data.data.questions)
        console.log(response.data.data.image)
    }).catch(function () {

    });
}

function onImageChoose(event) {
    const file = event.target.files[0];
    model.value.image = file;
    // console.log(file)
    const reader = new FileReader();
    reader.onload = () => {
        // this  send to backend to validate
        // model.value.image = reader.result; // base 64 string

        // but this to display here
        model.value.image_url = reader.result;
    }
    reader.readAsDataURL(file);
}

function onDateChange(ev) {
    model.value.expire_date = ev.target.value;
    console.log(ev.target.value)
}

function addQuestion(index) {
    const newQuestion = {
        id: uuidv4(),
        type: "text",
        question: "",
        description: null,
        options: [],
    }
    model.value.questions.push(newQuestion);
    questionChange(newQuestion)
    console.log(newQuestion.id);
}

function questionChange(question) {
    model.value.questions = model.value.questions.map((q) => {
        if (q.id === question.id) {
            return JSON.parse(JSON.stringify(question));
        }
        return q;
    });
}

function deleteQuestion(question) {

    model.value.questions = model.value.questions.filter((q) => q.id !== question.id);
}

//for create or save
function saveSurvey() {
    // let survey = {...model.value};
    // delete survey.image_url
    // console.log(survey)
    // console.log(model.value.questions)

    // console.log(model.value.questions);
    let formData = new FormData();
    formData.append('title', model.value.title);
    formData.append('status', model.value.status ? 1 : 0);
    formData.append('description', model.value.description);
    formData.append('image', model.value.image);
    formData.append('expire_date', model.value.expire_date);
    formData.append('questions', JSON.stringify(model.value.questions));
    let config = {
        headers: {
            "Content-Type": "multipart/form-data"
        }
    }
    if (route.params.id) {
        // console.log(typeof survey_id)
        formData.append('_method', 'PUT')

        axiosClient.post(`survey/${route.params.id}`, formData,config).then(function (response) {
            // console.log(response)

        }).catch(function (error) {
            console.log(error)
        });
    }else{

        axiosClient.post('/survey', formData,config).then(function (response) {
            console.log(response)

        }).catch(function (error) {
            console.log(error)
        });
    }


}
</script>

<style scoped>
.content {
    margin: 0 150px;
}
</style>
