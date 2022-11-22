<template>
  <div class="item">
    <img :src="survey.image" alt="">
    <div class="content-text">
      <h4>{{survey.title}}</h4>
      <p>{{survey.description}}</p>
    </div>
    <div class="actions">
      <!-- <RouterLink> -->
      <router-link :to="{ name: 'SurveyView', params:{ id: survey.id } }" class="edit">
        <i class="fas fa-edit"></i>
        Edit
      </router-link>

      <!-- </RouterLink> -->

      <button class="delete" @click="emit('delete',survey.id)">
        <i class="fas fa-trash"></i>
      </button>
    </div>

  </div>
</template>

<script setup>
const { survey } = defineProps({
  survey: Object
})
const emit = defineEmits(["edit","delete"])
</script>

<style scoped>
.item {
  border-radius: 20px;
  box-shadow: 2px 2px 10px #dfdfdf;
  overflow: hidden;
}

.item img {
  max-width: 100%;
}

.item h4 {
  margin: 0;
}

.content-text,
.actions {
  padding: 15px 10px;
}

.actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.actions .edit {
  background-color: blueviolet;
  padding: 8px 20px;
  color: #fff;
  border-radius: 10px;
}

.actions .delete {
  background-color: transparent;
  color: indianred;
  border: none;
  cursor: pointer;
  font-size: 18px;
}
</style>
