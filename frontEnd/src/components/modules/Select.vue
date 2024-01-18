<script>
import {getStates} from '@/services/GetStates.js'
import {getCities} from '@/services/GetCities.js'

export default {
  data() {
    return {
      states: [],
      cities: [],
      loading: false,
      stateSelected: false,
      citySelected: false,
    }
  },
  methods: {
    async loadStates() {
      this.states = await getStates();
    },

    async loadCities(state) {
      this.loading = true;
      this.cities = await getCities(state);
      this.loading = false;
    },

    async changeState(event){
      this.stateSelected = true
      await this.loadCities(event.target.value)
    },

    async changeCitie(event){
      this.citySelected =  true
      this.$emit('option-selected', event.target.value);
    },
  },

  created() {
    this.loadStates()
  }
}
</script>

<template>
  <div class="select-div">
    <div>
      <select @change="changeState">
        <option selected v-if="!stateSelected">Selecione o estado</option>
        <option v-for="state in states" :key="state.id" :value="state.id">{{ state.nome }}</option>
      </select>
    </div>
    <div>
      <div v-if="loading" class="load">Carregando...</div>
      <select v-else @change="changeCitie">
        <option selected v-if="!citySelected">Selecione a cidade</option>
        <option v-for="city in cities" :key="city.id" :value="city.nome">{{ city.nome }}</option>
      </select>
    </div>
  </div>
</template>

<style scoped>
  .load{
    text-align: center;
    color: white;
  }
  select{
    width: 100%;
    border: none;
    border-radius: 1rem;
    font-size: 1rem;
    padding: 0.4rem 0.5rem;
  }
  .select-div div{
    width: 270px
  }
  .select-div{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 1rem;
  }
</style>
