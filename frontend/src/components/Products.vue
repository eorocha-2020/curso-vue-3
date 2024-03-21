<template>
  <ul>
    <slot v-for="(product, index) in products" :key="index" :product="product">
    </slot>
  </ul>
</template>

<script setup>
  defineProps(['products'])
</script>
