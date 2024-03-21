<template>
  <button @click="showSomething">Show</button>

  <input type="text" v-if="showElement" ref="inputElement">

</template>

<script setup>

import {nextTick, ref} from "vue";

const showElement = ref(false);
const inputElement = ref(null);
const showSomething = () => {
  showElement.value = true;

  nextTick(() => {
    inputElement.value.focus();
    console.log(inputElement.value);
  })

  console.log('show');
}

</script>

<style scoped>

</style>