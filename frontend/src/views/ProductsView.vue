<template>
  <Products :products="products" v-slot="props">
    <li @click="getProduct(props.product.id)">{{ props.product.name }}</li>
  </Products>
</template>


<script setup>
import Products from "@/components/Products.vue";
import {reactive, ref} from "vue";

const product = reactive({
  likes: 20,
  comments: 15
})

const products = reactive([
  {
    id:1,
    name:'Imac'
  },
  {
    id:2,
    name:'MacBook'
  },
  {
    id:3,
    name:'Mouse'
  }
])

function getProduct(id) {
  console.log(id)
}

</script>


<style scoped>

</style>