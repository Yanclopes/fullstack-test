<script>
  import Ensolarado from './icons/Ensolarado.vue'
  import Nublado from './icons/Nublado.vue'
  import Chuvoso from './icons/Chuvoso.vue'
  export default {
    name : 'Card',
    components: {
      Ensolarado,
      Nublado,
      Chuvoso
    },
    data() {
      return {
        climate: '',
        componentClimate: null,
        mapClimate: {
          'ensolarado': 'Ensolarado',
          'nublado': 'Nublado',
          'chuvoso': 'Chuvoso'
        }
      }
    },
    methods: {
      getClima() {

      },
      setClimaComponente() {
        this.componenteClima = this.mapClimate[this.climate] || 'Ensolarado';
      }
    },
    created() {
      this.getClima()
      this.setClimaComponente()
    }
  }
</script>

<template>
  <div>
    <div>
      <component :is="componentClimate"></component>
      <h2>{temperature}°C</h2>
      <h3>{climate}</h3>
    </div>
    <div>
      <div>

        <div>
          <span>{humidity}%</span>
          <span>Umidade</span>
        </div>
      </div>
      <div>

        <div>
          <span>{speed}km/h</span>
          <span>Veloc. Vento</span>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>