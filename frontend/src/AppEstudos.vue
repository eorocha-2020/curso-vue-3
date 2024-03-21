<template>
  <img :src="image" alt="" :class="{'my-class':is_admin, 'my-other-class':!is_admin}" class="my-default-class">
  <button @click="add('teste')">Clique aqui {{ count }}</button>

  <form action="http://google.com.br">
    <input type="text" placeholder="buscar">
    <button @click.submit.prevent="search">Buscar</button>
  </form>

  <input type="text" placeholder="Name" v-model="userName">
  {{ userName }}
  <hr>
  <h2>Lista de Users</h2>
  <ul>
    <li v-for="user in users.users" :key="user.id">
      {{ user.firstName }}
      <button v-if="user.is_admin">Admin</button>
      <button v-else>Not Admin</button>
    </li>
  </ul>
</template>

<script setup>
import {onMounted, reactive, ref} from "vue";
import http from '@/services/https.js';

let users = reactive({users: []});
const image = ref('https://picsum.photos/200/300');
let is_admin = ref(false);
const count = ref(0);
const userName = ref('');

function add(teste) {
  console.log(teste)
  count.value++
}

function changeName(event) {
  userName.value = event.target.value;
}

function search(event) {
  console.log('buscou')
}

onMounted(async () => {
  try {
    const {data} = await http.get('/api/users')
    users.users = data;
  } catch (e) {
    console.log(e)
  }
})

</script>

<style scoped>
.my-class {
  border: solid 4px red;
}

.my-other-class {
  border: solid 4px blue;
}
</style>

