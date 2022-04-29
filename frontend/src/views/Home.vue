<template>
  <div class="home">
    
    <HelloWorld/>
    <b-table striped hover :items="users"></b-table>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'Home',
  components: {
    HelloWorld
  },
  data() {
      return {
          users:null
      }
  },
  created(){
     const baseURI = 'http://127.0.0.1:8000/api/eletrodomestico/2'
      this.$http.get(baseURI)
      .then((result) => {
        console.log(result)
        this.users = result.data
      })
  },
  methods: {
    eletrodomesticos: function () {
      const baseURI = 'http://127.0.0.1:8000/api/eletrodomestico'
      this.$http.get(baseURI)
      .then((result) => {
        this.users = result.data
      })
    }
  }
}
</script>
