<template>
    <div class="d-flex justify-content-between">
        <span>{{ index + 1 }}.</span>
        <input type="text" v-model="optionModel.text" class="form-control">
        <button class="btn btn-outline-danger" type="button" @click="removeOption(optionModel)">
            <i class="fas fa-trash"></i>
        </button>
    </div>

</template>

<script setup>
import {ref} from "vue";

const props = defineProps({
    option: Object,
    index: Number
});

const optionModel = ref(props.option);
// const optionModel = ref(JSON.parse(JSON.stringify(props.option)));

const emit = defineEmits(['removeOption'])

function removeOption() {
    emit("removeOption",props.option);
}
</script>

<style scoped>

</style>
