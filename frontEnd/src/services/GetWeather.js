import {http} from './index.js'
export async function getWeather(city) {
    try {
        const resposta = await http.get(`/weather/${city}`);
        console.log(resposta)
        return resposta.data
    } catch (erro) {

    }
}
