<template>
  <br>
  <br>
  <label for="">Search:</label>
  <input type="text" placeholder="Search" v-model="userSearch" @keyup="search">

  <ul>
    <li v-for="(user, index) in users['users'].data" :key="index">
      {{ user.firstName }} {{ user.lastName }}
    </li>
  </ul>

  <Bootstrap4Pagination
      :data="users['users']"
      @pagination-change-page="handleEventPagination"
      :limit="1"
  />

  <div v-html="userNotFound"></div>

</template>

<script setup>
import https from "@/services/https.js";
import {onMounted, ref, reactive, computed} from "vue";
import _ from 'lodash';
import {Bootstrap4Pagination} from 'laravel-vue-pagination';

const rotas = {
  usersSearch: 'api/users/search?page='
}
const users = reactive({users: []});
const userSearch = ref();
const loading = ref(true);

onMounted(async () => {
  await getUsers();
});

const userNotFound = computed(() => {
  return (!loading.value && users['users'].data.length <= 0) ? '<span id="notFound">Nenhum user encontrado</span>' : '';
})

const search = _.debounce(async () => {
  await searchUser();
}, 900);
const getUsers = async (page = 1) => {
  try {
    const {data} = await https.get('api/users?page=' + Number(page));
    loading.value = false;
    users['users'] = data;
    console.log(data)
  } catch (error) {
    console.log(error.response.data)
  }
}
const searchUser = async (page = 1) => {
  try {
    const {data} = await https.get(rotas.usersSearch + Number(page), {
      params: {
        user: userSearch.value
      }
    });

    if (!userSearch.value) {
      await getUsers();
      return;
    }
    users['users'] = data;

  } catch (error) {
    console.log(error.response.data)
  }
}
const handleEventPagination = (page) => {
  return userSearch.value ? searchUser(page) : getUsers(page)
}

</script>

<style>
#notFound {
  color: red;
}

</style>
