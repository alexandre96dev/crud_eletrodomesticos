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
        
    }
}
export default marcas;
