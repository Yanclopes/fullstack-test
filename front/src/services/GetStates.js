import {http} from './index.js'
async function getStates() {
    try {
        const resposta = await instance.get('/estados');
        return resposta.data
    } catch (erro) {
        return
    }
}