<script>
  import {getWeatherByIp} from '@/services/GetWeatherByIp.js'
  import {getWeather} from '@/services/GetWeather.js'
  export default {
    name : 'Card',
    props:{
      ip: Boolean,
      selectedOption: String,
    },
    data() {
      return {
        isLoading: true,
        weather: Array,
      }
    },
    methods: {
      async setWeather() {
        this.isLoading = true
        this.weather = this.ip ? await getWeatherByIp() : await getWeather(this.selectedOption)
        this.isLoading = false
      }
    },
    created() {
      this.setWeather()
    },
    watch: {
      selectedOption() {
        this.setWeather()
      },
    }
  }
</script>

<template>
  <div>
    <div v-if="isLoading">carregando...</div>
    <div v-else>
      <div>
        <img :src="`https://openweathermap.org/img/wn/${weather.weather[0].icon}@2x.png`" alt="icone"/>
        <h2>{{weather.main.temp}}°C</h2>
        <h3>{{weather.weather[0].main}}</h3>
      </div>
      <div>
        <div>

          <div>
            <span>{{weather.main.humidity}}%</span>
            <span>Umidade</span>
          </div>
        </div>
        <div>

          <div>
            <span>{{(weather.wind.speed * 3.6).toFixed(2)}}km/h</span>
            <span>Veloc. Vento</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>