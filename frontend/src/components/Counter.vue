<template>
  {{ store.state.count }}
</template>

<script setup>

import {useStore} from "vuex";

const store = useStore()
</script>

<style scoped>

</style>