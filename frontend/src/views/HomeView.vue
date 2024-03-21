<template>
  {{ count }} {{ name }}
  <button @click="add">Add</button>
  <button @click="reset">Reset</button>
  <hr>
  {{ getCounter }}
</template>

<script setup>

import {useCounter} from "@/store/Counter.js";
import {storeToRefs} from "pinia";

const counter = useCounter();

counter.$state = {count: 100, name: 'Maria'}

const {count, getCounter, name} = storeToRefs(counter);
const {increment} = counter;

function add() {
  counter.$patch({
    count: count.value + 10,
    name: 'Lucas'
  })
}

function reset() {
  counter.$reset();
}

</script>