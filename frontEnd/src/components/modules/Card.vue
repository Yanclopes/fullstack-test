<script>
  import {getWeatherByIp} from '@/services/GetWeatherByIp.js'
  import {getWeather} from '@/services/GetWeather.js'
  import IconWind from "@/components/icons/IconWind.vue";
  import IconHumidity from "@/components/icons/IconHumidity.vue";
  export default {
    name : 'Card',
    components: {IconHumidity, IconWind},
    props:{
      ip: Boolean,
      selectedOption: String,
    },
    data() {
      return {
        isLoading: true,
        weather: Array,
        background:{
          dia: '/images/dia.svg',
          noite: '/images/noite.svg',
          nublado: '/images/nublado.svg',
        }
      }
    },
    methods: {
      async setWeather() {
        this.isLoading = true
        this.weather = this.ip ? await getWeatherByIp() : await getWeather(this.selectedOption)
        this.isLoading = false
      },
      unixToMinutes: function (unixTimestamp) {
        const date = new Date(unixTimestamp * 1000);
        return date.getHours() * 60 + date.getMinutes();
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
  <div class="card">
    <div class="card-div load" v-if="isLoading"><div class="loader"></div></div>
    <div class="card-div" v-else>
      <div class="weather" :style="`background-image: url(${unixToMinutes(weather.dt) >= 360 && unixToMinutes(weather.dt) < 1080 ?  (weather.weather[0].id !== 800 ? background.nublado : background.dia) : background.noite}); background-position: center`">
        <img :src="`https://openweathermap.org/img/wn/${weather.weather[0].icon}@2x.png`" alt="icone"/>
        <h2>{{weather.main.temp.toFixed(0)}}°C</h2>
        <h3>{{weather.weather[0].description}}</h3>
      </div>
      <div class="d-flex date">
        <div class="d-flex">
          <icon-humidity/>
          <div class="span">
            <span>{{weather.main.humidity}}%</span>
            <span>Umidade</span>
          </div>
        </div>
        <div class="d-flex">
          <icon-wind/>
          <div class="span">
            <span>{{(weather.wind.speed * 3.6).toFixed(0)}} km/h</span>
            <span>Veloc. Vento</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
  h2{
    font-size: 2.5rem;
    margin: 1rem auto;
  }
  .card{
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
  }
  .card-div{
    width: 270px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .weather{
    border-radius: 16px 16px 0 0;
    background: white;
  }
  .weather,.date{
    padding: 1.5rem 1rem;
  }
  .span{
    display: flex;
    flex-direction: column;
  }
  span{
    font-size: 1rem;
  }
  .date{
    background: aliceblue;
    border-radius: 0 0 16px 16px;
  }
  .weather img{
    width: 100px;
  }
  .d-flex{
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 0.4rem;
  }
  .load{
    align-items: center;
  }
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .loader {
    border: 8px solid #f3f3f3;
    border-radius: 50%;
    border-top: 8px solid #3498db;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
  }
</style>
