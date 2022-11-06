<template>

    <div class="form-check">
        <input type="checkbox" :style="{'background-color' :color }" :value="color" v-model="colors_selected"
            :id="color" @change="changeColor(color)">
    </div>


    <!-- {{ selected.colors_selected}} -->
</template>
<!-- :class="{selected : isSelected }" -->
<!-- :style="{color :color }" -->
<script>
export default {
    name: 'ColorItem',
    props: ['color'],
    emits: {
        filterColor: null,
    },
    data() {
        return {
            isSelected: false,
            colors_selected: ''
        }
    },
    methods: {
        changeColor(color) {
            // console.log(this.selected.colors_selected);
            this.$emit('filterColor', color);
        }
    }
}
</script>

<style scoped>
.colors input[type='checkbox'] {

    border-radius: 50%;
    height: 50px;
    width: 50px;
    border: none;
    outline: 0;
    box-shadow: 2px 2px 10px #dfdfdf;
    /* background-color: #2b3d3d; */
    -moz-appearance: none;
    -webkit-appearance: none;
    -o-appearance: none;
    cursor: pointer;
    opacity: .6;
}

.colors input[type='checkbox']:checked {
    opacity: 1;
    -moz-appearance: none;
    -webkit-appearance: none;
    -o-appearance: none;
}

</style>
