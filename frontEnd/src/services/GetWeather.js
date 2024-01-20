import {http} from './index.js'
export async function getWeather(city) {
    return http.get(`/weather?city=${city}`)
        .then(response => {
            return response.data;
        })
        .catch(error => {
            if (error.response) {
                return { error: true, message: 'Erro de resposta do servidor' };
            } else if (error.request) {
                return { error: true, message: 'Sem resposta do servidor' };
            } else {
                return { error: true, message: 'Erro ao configurar a requisição' };
            }
        });
}
