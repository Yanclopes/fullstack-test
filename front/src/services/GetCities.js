import {http} from './index.js'
async function getCities(state) {
    try {
        const resposta = await instance.get(`/cidades/${state}`);
        return resposta.data
    } catch (erro) {
        return
    }
}