<template>
  <div class="about">
      <HelloWorld/>
      <b-button @click="marcas">Reload</b-button>
      <b-table striped hover :items="users"></b-table>
  </div>
</template>

<script>
import HelloWorld from '@/components/HelloWorld.vue'
import MarcasService from '@/services/marcas/marcas'

export default {
  name: 'About',
  components: {
    HelloWorld
  },
  data() {
      return {
          users:[]
      }
  },beforeCreate(){
    
  },
  mounted(){
    //  const baseURI = 'http://127.0.0.1:8000/api/eletrodomestico/2'
    //   this.$http.get(baseURI)
    //   .then((result) => {
    //     console.log(result)
    //     this.users = result.data
    //   })
    
  },
  methods: {
    marcas(){
      //this.users.push(EletrodomesticosService.getEletrodomesticos())
      MarcasService.getMarcas().then(result =>{
        this.users = result.data;
      })
      //console.log(this.users)
    }
  }
}
</script>

