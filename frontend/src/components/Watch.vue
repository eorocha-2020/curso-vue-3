<template>
  <input type="text" v-model="user.firstName" placeholder="First Name">
  <input type="text" v-model="user.lastName" placeholder="Last Name">
</template>

<script setup>

import {reactive, ref, watch} from "vue";

const firstName = ref('');
const lastName = ref('');
const user = reactive(
  {
    firstName:'',
    lastName:''
  }
)

watch(user, (value, oldValue) => {
  console.log('new=>'+value.firstName, 'old=>'+oldValue.firstName)
})
</script>

<style scoped>

input {
  border: solid 1px;
  border-radius: 4px;
}

</style>