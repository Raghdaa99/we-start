<template>
    <div class="form-check" >
        <input type="checkbox"
         :value="id" 
         :id="id" 
         v-model="brands_ids" 
         @change="filterBrand(id)">
        <label :for="id">{{name}}</label>
    </div>
    <!-- {{ brands_ids}} -->
</template>

<script>
export default {
    name: 'CheckedBox',
    props:['id','name'],
    emits :{
          filterBrand: null,
        },
    data() {
        return {
            brands_ids:''
        }
    },
    methods: {
        filterBrand(id) {
            this.$emit('filterBrand',  id);
        }
    }
}
</script>
