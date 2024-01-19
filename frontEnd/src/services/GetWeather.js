import {http} from './index.js'
export async function getWeather(city) {
    return http.get(`/weather?city=${city}`)
        .then(response => {
            console.log(response)
            return response.data;
        })
        .catch(error => {
            console.log(error)
            if (error.response) {
                return { error: true, message: 'Erro de resposta do servidor' };
            } else if (error.request) {
                return { error: true, message: 'Sem resposta do servidor' };
            } else {
                return { error: true, message: 'Erro ao configurar a requisição' };
            }
        });
}
