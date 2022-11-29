<template>
    <div class="question-details">
        <div class="d-flex align-items-center">
            <h3 class="col-10">
                {{ index + 1 }}. {{ modelQuestion.question }}
            </h3>
            <div class="col-4 justify-content-end">
                <button class="btn btn-dark m-4" type="button" @click="addQuestion">
                    <i class="fa fa-add"></i>
                    Add
                </button>
                <button class="btn btn-outline-danger" type="button" @click="deleteQuestion">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
        <div class="question-text-type">
            <div class="d-flex align-items-center mr-3">
                <div class="col-8">
                    <div class="form-group">
                        <label>Question Text</label>
                        <input type="text" name="title" id="" v-model="modelQuestion.question" class="form-control">
                    </div>

                </div>
                <div class="col-4">
                    <div class="form-select-lg">
                        <label>Select Question Type</label>
                        <select class="form-select" id="question_type" @change="typeChange" name="question_type"
                                v-model="modelQuestion.type">
                            <option v-for="type in questionTypes" :key="type" :value="type"> {{ type }}</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="4"
                      v-model="modelQuestion.description"></textarea>
        </div>

        <div v-if="shouldHaveOptions()" class="options mb-3">
            <div class="d-flex mt-3 justify-content-start align-items-center">
                <span>Options</span>
                <button class="btn btn-dark m-lg-3" @click.prevent="addOption">
                    <i class="fa fa-add"></i>
                    Add Options
                </button>
            </div>
            <!--            {{JSON.parse(modelQuestion.options)}}-->
            <OptionEditor v-for="(option, index) in modelQuestion.options" :key="option.uuid"
                          :option="option"
                          :index="index"
                          @removeOption="removeOption">
            </OptionEditor>

            <div v-if="!modelQuestion.options.length">
                you dont have any option defined
            </div>
            <!--      <div v-for="(option, index) in modelQuestion.data.options" :key="option.uuid" class="d-flex justify-content-between">-->
            <!--        <span>{{ index + 1 }}.</span>-->
            <!--        <input type="text" v-model="option.text" @change="dataChange" class="form-control">-->
            <!--        <button class="btn btn-outline-danger" type="button" @click="removeOption(option)"><i class="fas fa-trash"></i></button>-->
            <!--      </div>-->
        </div>


    </div>
</template>


<script setup>
import {useStore} from '../../stores';
import {computed, ref} from "vue";
import {v4 as uuidv4} from "uuid";
import OptionEditor from "./OptionEditor.vue";

const store = useStore();
const props = defineProps({
    question: Object,
    index: Number
})

const emit = defineEmits(["change", "addQuestion", "deleteQuestion"]);

const modelQuestion = ref(props.question);

// const modelQuestion = ref(JSON.parse(JSON.stringify(props.question)));

const questionTypes = computed(() => store.getQuestionTypes);


function shouldHaveOptions() {
    return ["select", "radio", "checkbox"].includes(modelQuestion.value.type); // اذا كان يحتوي علي اي من قيم الاوبشنز يقوم بتغيير نمط السؤال الي ابوشن
}

function addOption() {
    let newOption = {uuid: uuidv4(), text: ""}
    modelQuestion.value.options.push(newOption);
}

function removeOption(option) {

    modelQuestion.value.options = modelQuestion.value.options.filter((op) => op.uuid !== option.uuid);
}

function addQuestion() {
    emit("addQuestion", props.index + 1);
}

function deleteQuestion() {
    emit("deleteQuestion", props.question);
}

function typeChange() {
    emit('change', props.question);
}

</script>


<!-- <script>
export default {
  name: 'QuestionEditor',
  data() {
    return {
      modelQuestion: JSON.parse(JSON.stringify(this.question)),
    }
  },
  props: ['question', 'index'],

}
</script> -->
<style scoped>

</style>
