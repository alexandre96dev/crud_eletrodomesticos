<template>
  <div class="about">
      <Layout></Layout>
      <b-button variant="success" v-b-modal.cadastro-marca>Adicionar</b-button>
      <!-- <b-button variant="success" v-b-modal.cadastro-eletro>Adicionar</b-button> -->
      <b-table :fields="fields" :items="users" ref="table">
        <template v-slot:cell(actions)="data">
          <b-button size="sm" class="mr-2" variant="info" v-b-modal.edit-marca @click="abrirModalAlterarMarca(data.item.id)">Editar</b-button>
          <b-button size="sm" variant="danger" @click="deletarMarca(data.item.id)">Excluir</b-button>
        </template>
      </b-table>
    <b-modal id="cadastro-marca" hide-footer>
      <label for="nome-marca">Nome</label>
      <b-form-input id="nome-marca" v-model="form.nome"></b-form-input>
      <div>
        <b-button variant="success" block @click="cadastrarMarca">Ok</b-button>
        <b-button  block @click="$bvModal.hide('cadastro-marca')">Close Me</b-button>
      </div>
    </b-modal>

    <b-modal id="edit-marca" hide-footer>
      <label for="nome-edit-marca">Nome</label>
      <b-form-input id="nome-edit-marca" v-model="formEdit.nome"></b-form-input>
      <div>
        <b-button variant="success" block @click="atualizarMarca">Ok</b-button>
        <b-button  block @click="$bvModal.hide('edit-eletro')">Close Me</b-button>
      </div>
    </b-modal>
  </div>
</template>

<script>
import Layout from '@/components/Layout.vue'
import MarcasService from '@/services/marcas/marcas'

export default {
  name: 'Marcas',
  components: {
    Layout
  },
  data() {
      return {
          users:[],
          key:1,
          form:{
            nome:"",
          },
          atualizar:false,
          formEdit:{
            id:"",
            nome:"",
          },
          marcas:[],
          marcaselected:"",
          marcaseditelected:"",
          fields: [
          {
            key: 'id'
          },
          {
            key: 'nome'
          },
          {
            key: 'actions'
          }
        ]
      }
  },
  mounted(){
    this.listarMarcas()
  },
  methods: {
    listarMarcas(){
      MarcasService.getMarcas().then(result =>{
        this.users = result.data;
      })
    },
    cadastrarMarca(){
      MarcasService.cadastroMarca(this.form.nome)
      this.$bvModal.hide('cadastro-marca')
      this.listarMarcas()
      setTimeout(function(){
        document.location.reload()
      }, 1500)
    },
    abrirModalAlterarMarca(idMarca){
      console.log(idMarca)
       MarcasService.listarMarcaPorId(idMarca).then(result =>{
        this.formEdit.id  = result.data[0].id
        this.formEdit.nome = result.data[0].nome
        console.log(result)
      })
    },
    atualizarMarca(){
      MarcasService.atualizarMarca(this.formEdit.id, this.formEdit.nome)
      this.listarMarcas()
      this.$bvModal.hide('edit-marca')
      setTimeout(function(){
        document.location.reload()
      }, 1500)
    },
    deletarMarca(idMarca){
      MarcasService.deletarMarca(idMarca)
      this.listarMarcas() 
    }
  }
}
</script>

