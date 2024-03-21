<template>
  <input type="text" v-model="user.firstName">
  <input type="text" v-model="user.lastName">
</template>

<script setup>
import {reactive, ref, watch, watchEffect} from "vue";

const firstName = ref('');
const lastName = ref('');
const user = reactive({
  firstName:'',
  lastName:''
});

watchEffect(() => {
  console.log(user.firstName, user.lastName)
})
</script>

<style scoped>

</style>