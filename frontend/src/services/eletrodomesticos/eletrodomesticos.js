import Vue from "vue"
import axios from "axios"
Vue.prototype.$http = axios;
const baseURI = 'http://127.0.0.1:8000/api/eletrodomesticos'
const Eletrodomesticos = {
    getEletrodomesticos(){
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
    cadastroEletrodomesticos(nomecadastro, descricaocadastro, tensaocadastro, marca_id){
        return new Promise(resolve =>{
            axios.post(baseURI, {
                nome:nomecadastro,
                descricao:descricaocadastro,
                tensao:tensaocadastro,
                id:marca_id
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
    atualizarEletrodomestico(idEletro, nomeEdit, descEdit, tensaoEdit, marcaIdEdit){
        return new Promise(resolve =>{
            axios.put(baseURI+'/'+idEletro,{
                nome: nomeEdit,
                descricao: descEdit,
                tensao: tensaoEdit,
                id: marcaIdEdit
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
    deletarEletrodomesticos(idEletro){
        return new Promise(resolve =>{
            axios.get('http://127.0.0.1:8000/api/eletrodomesticos/deletar/'+idEletro)
            .then(response => {
                console.log(response)
                resolve(response)
            })
            .catch(error => {
                resolve(error)     
            })
        })
    },
    listarEletrodomesticoPorId(id){
        return new Promise(resolve =>{
            axios.get(baseURI+'/'+id)
            .then(response => {
                resolve(response)
            })
            .catch(error => {
                resolve(error)     
            })
        }) 
    }
}
export default Eletrodomesticos;
