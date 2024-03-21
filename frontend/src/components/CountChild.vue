<template>
  <button @click="add">Add count from child</button>
</template>

<script setup>
const emit = defineEmits(['addCount'])

function add() {
  emit('addCount', 10)
}
</script>

<style scoped>

</style>