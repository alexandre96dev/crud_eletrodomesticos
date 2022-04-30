import Vue from "vue"
import axios from "axios"
Vue.prototype.$http = axios;
const baseURI = 'http://127.0.0.1:8000/api/marcas'
const marcas = {
    getMarcas(){
        return new Promise(resolve =>{
            axios.get(baseURI)
            .then(response => {
                console.log(response)
                resolve(response)
            })
            .catch(error => {
                resolve(error)     
            })
        })
        
    },
    cadastroMarca(nomecadastro){
        return new Promise(resolve =>{
            axios.post(baseURI, {
                nome:nomecadastro,
            })
            .then(response => {
                console.log(response)
                resolve(response)
            })
            .catch(error => {
                resolve(error)     
            })
        })
        
    },
    atualizarMarca(idMarca, nomeEdit){
        return new Promise(resolve =>{
            axios.put(baseURI+'/'+idMarca,{
                nome: nomeEdit,
            })
            .then(response => {
                console.log(response)
                resolve(response)
            })
            .catch(error => {
                resolve(error)     
            })
        })
    },
    listarMarcaPorId(id){
        return new Promise(resolve =>{
            axios.get(baseURI+'/'+id)
            .then(response => {
                resolve(response)
            })
            .catch(error => {
                resolve(error)     
            })
        }) 
    },
    deletarMarca(idMarca){
        return new Promise(resolve =>{
            axios.get(baseURI+'/deletar/'+idMarca)
            .then(response => {
                console.log(response)
                resolve(response)
            })
            .catch(error => {
                resolve(error)     
            })
        })
    },
}
export default marcas;
