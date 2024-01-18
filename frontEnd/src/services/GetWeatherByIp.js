import {http} from './index.js'
import axios from "axios";
export async function getWeatherByIp(city) {
    try {
        const weather = await http.get('/ip/weather')
        console.log(weather.data)
        return weather.data
    } catch (erro) {

    }
}
