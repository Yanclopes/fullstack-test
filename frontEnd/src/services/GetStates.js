import {http} from './index.js'
export async function getStates() {
    try {
        const resposta = await http.get('/states');
        return resposta.data
    } catch (erro) {
        return
    }
}