import {http} from './index.js'
export async function getWeatherByIp() {
    return http.get('/ip/weather')
        .then(response => {
            return response.data;
        })
        .catch(error => {
            if (error.response) {
                return { ip : true, error: true, message: 'Erro de resposta do servidor' };
            } else if (error.request) {
                return { ip : true, error: true, message: 'Sem resposta do servidor' };
            } else {
                return { ip : true, error: true, message: 'Erro ao configurar a requisição' };
            }
        });

}
