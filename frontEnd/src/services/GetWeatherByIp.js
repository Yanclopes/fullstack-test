import {http} from './index.js'
import axios from "axios";
export async function getWeatherByIp(city) {
    try {
        const response = await axios.get('https://api.ipify.org?format=json');
        const weather = await http.get(`/ip/weather?ip=${response.data.ip}`)
        console.log(weather.data)
        return weather.data
    } catch (erro) {

    }
}
