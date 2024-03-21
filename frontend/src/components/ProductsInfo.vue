<template>
likes:{{ props.likes }}
  <br>
Comments: {{ props.comments }}
</template>

<script setup>
const props = defineProps({
  likes:Number,
  comments:Number
})
</script>
