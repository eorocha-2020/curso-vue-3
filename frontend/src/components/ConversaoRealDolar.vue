<template>
  <Currency type="text" v-model="dolar" placeholder="Dólar"  :options="{ currency: 'USD' }"/>
  <br>
  <hr>
  <br>
  <ul>
    <li>{{ dolarTodayValue }}</li>
    <li>{{ dolarToReaisValue }}</li>
  </ul>
</template>

<script setup>
import { ref, computed, onMounted, watch} from "vue";
import https from "@/services/https.js";
import format from "@/services/formato.js";
import Currency from "@/components/Currency.vue";

const dolar = ref(0);
const dolarToday = ref(0);
const dolarToReal = ref(0);

const dolarToReaisValue = computed(() => {
  return `O valor em reais de ${format(dolar.value, 'en-US', 'USD')} é: ${format(dolarToReal.value, 'pt-BR', 'BRL')}`
});
const dolarTodayValue = computed(() => {
  return `O dólar hoje está em: ${format(dolarToday.value, 'en-US', 'USD')}`
})

onMounted(async () => {
  try {
    const dolar = await getDolar();
    dolarToday.value = dolar['high'];
  } catch (error) {
    console.log(error.response.data)
  }

})
const getDolar = async (typeCurrency = 'USD-BRL') => {
  const {data} = await https.get('https://economia.awesomeapi.com.br/json/last/'+typeCurrency);
  const currency = typeCurrency.split('-').join('');
  return data[currency];
}

watch(dolar, (value) => {
  dolarToReal.value = value * Number(dolarToday.value);
})
</script>

<style scoped>
input {
  border: solid 1px;
  border-radius: 3px;
}
</style>