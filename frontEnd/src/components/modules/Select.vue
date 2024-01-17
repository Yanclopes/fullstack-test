<script setup>
import { ref } from 'vue';
import {getStates} from '@/services/GetStates.js'
import {getCities} from '@/services/GetCities.js'

const states = ref([]);
const cities = ref([]);
const loading = ref(false);

async function loadStates() {
  states.value = await getStates();
}

async function loadCities(state) {
  loading.value = true;
  cities.value = await getCities(state);
  loading.value = false;
}
loadStates();

async function changeState(event){
  await loadCities(event.target.value)
}

async function changeCitie(event){
  this.$emit('option-selected', event.target.value);
}
</script>

<template>
  <div>
    <div>
      <select @change="changeState">
        <option v-for="state in states" :key="state.id" :value="state.id">{{ state.name }}</option>
      </select>
    </div>
    <div>
      <div v-if="loading">Carregando...</div>
      <select v-else @change="changeCitie">
        <option v-for="city in cities" :key="city.id" :value="state.id">{{ city.name }}</option>
      </select>
    </div>
  </div>
</template>

<style scoped>
</style>