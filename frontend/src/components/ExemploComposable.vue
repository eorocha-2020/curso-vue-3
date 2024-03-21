<template>
  <button @click="increment">add</button>
  {{ count }}

  <hr>

  <ul>
    <li v-for="(user, index) in users['users']" :key="index">
      {{ user.firstName }}
    </li>
  </ul>
</template>

<script setup>
import { useCount } from "@/composables/count.js";
import { useUsers } from "@/composables/users.js";

const {count, increment} = useCount();
const {users} = useUsers();

</script>