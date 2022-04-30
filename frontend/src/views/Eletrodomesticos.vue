<template>
  <div class="home">
    
    <Layout/>
    <b-button variant="success" v-b-modal.cadastro-eletro @click="listarMarcas">Adicionar</b-button>
    <b-button @click="listarEletrodomesticos" id="reload" style="visibility:hidden;">Reload</b-button>
       
    <b-table :fields="fields" :items="users" ref="table">
      <template v-slot:cell(actions)="data">
        <b-button size="sm" class="mr-2" variant="info" v-b-modal.edit-eletro @click="abrirModalAlterarEletro(data.item.id)">Editar</b-button>
        <b-button size="sm" variant="danger" @click="deletarEletro(data.item.id)">Excluir</b-button>
      </template>
		</b-table>

    <b-modal id="cadastro-eletro" hide-footer>
      <label for="nome-eletro">Nome</label>
      <b-form-input id="nome-eletro" v-model="form.nome"></b-form-input>
      <label for="desc-eletro">Descrição</label>
      <b-form-input id="desc-eletro" v-model="form.descricao"></b-form-input>
      <label for="tensao-eletro">tensao</label>
      <b-form-input id="tensao-eletro" v-model="form.tensao"></b-form-input>
      <b-form-select v-model="marcaselected"  class="mb-3">
        <b-form-select-option v-for="item in marcas" :key="item.id" :value="item.id">{{ item.nome }}</b-form-select-option>
      </b-form-select>
      <div>
        <b-button variant="success" block @click="cadastrarEletro">Ok</b-button>
        <b-button  block @click="$bvModal.hide('cadastro-eletro')">Close Me</b-button>
      </div>
    </b-modal>

    <b-modal id="edit-eletro" hide-footer>
      <label for="nome-edit-eletro">Nome</label>
      <b-form-input id="nome-edit-eletro" v-model="formEdit.nome"></b-form-input>
      <label for="desc-edit-eletro">Descrição</label>
      <b-form-input id="desc-edit-eletro" v-model="formEdit.descricao"></b-form-input>
      <label for="tensao-edit-eletro">tensao</label>
      <b-form-input id="tensao-edit-eletro" v-model="formEdit.tensao"></b-form-input>
      <b-form-select v-model="marcaselected"  class="mb-3">
        <b-form-select-option v-for="item in marcas" :key="item.id" :value="item.id">{{ item.nome }}</b-form-select-option>
      </b-form-select>
      <div>
        <b-button variant="success" block @click="atualizarEletro">Ok</b-button>
        <b-button  block @click="$bvModal.hide('edit-eletro')">Close Me</b-button>
      </div>
    </b-modal>
  </div>
</template>

<script>
// @ is an alias to /src
import Layout from '@/components/Layout.vue'
import EletrodomesticosService from '@/services/eletrodomesticos/eletrodomesticos'
import MarcasService from '@/services/marcas/marcas'

export default {
  name: 'Home',
  components: {
    Layout
  },
  data() {
      return {
          users:[],
          key:1,
          form:{
            nome:"",
            descricao:"",
            tensao:""
          },
          atualizar:false,
          formEdit:{
            nome:"",
            descricao:"",
            tensao:""
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
            key: 'descricao'
          },
          {
            key: 'marca'
          },
          {
            key: 'tensao'
          },
          {
            key: 'actions'
          }
        ]
      }
  },
  mounted(){  
    this.listarEletrodomesticos() 
  },
  methods: {
    listarEletrodomesticos(){
      EletrodomesticosService.getEletrodomesticos().then(result =>{
        this.users = result.data;
      })
      console.log(this.users)
    },
    listarMarcas(){
      MarcasService.getMarcas().then(result =>{
        this.marcas = result.data;
      })
      console.log(this.marcas)
    },
    cadastrarEletro(){
      this.listarEletrodomesticos()
      this.$bvModal.hide('cadastro-eletro')
      EletrodomesticosService.cadastroEletrodomesticos(this.form.nome, this.form.descricao, this.form.tensao, this.marcaselected)
      this.listarEletrodomesticos()
      setTimeout(function(){
        document.location.reload()
      }, 1500)
     
    },
    atualizarEletro(){
      EletrodomesticosService.atualizarEletrodomestico(this.formEdit.id, this.formEdit.nome, this.formEdit.descricao, this.formEdit.tensao, this.marcaseditelected)
      this.listarEletrodomesticos()
      this.$bvModal.hide('edit-eletro')
      setTimeout(function(){
        document.location.reload()
      }, 1500)
    },
    deletarEletro(id){
      EletrodomesticosService.deletarEletrodomesticos(id)
      this.listarEletrodomesticos() 
    },
    abrirModalAlterarEletro(id){
      MarcasService.getMarcas().then(result =>{
        this.marcas = result.data;
      })
      EletrodomesticosService.listarEletrodomesticoPorId(id).then(result =>{
        this.formEdit.id  = result.data[0].id
        this.formEdit.nome = result.data[0].nome
        this.formEdit.descricao = result.data[0].descricao
        this.formEdit.tensao = result.data[0].tensao
      })
    }
  }
}
</script>
