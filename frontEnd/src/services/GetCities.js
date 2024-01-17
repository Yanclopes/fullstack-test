import {http} from './index.js'
export async function getCities(state) {
    try {
        const resposta = await http.get(`/cities/${state}`);
        return resposta.data
    } catch (erro) {
        return
    }
}