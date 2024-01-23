import { http } from './index.js';

export function getCities(state) {
    return http.get(`/cities/${state}`)
        .then(response => {
            return response.data.sort((a, b) => a.nome.localeCompare(b.nome, 'pt-BR', { sensitivity: 'base' }));
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
