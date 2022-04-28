<template>
  <b-navbar toggleable="lg" type="dark" variant="info">
    <b-navbar-brand href="#">
      
      </b-navbar-brand>
    <b-navbar-brand href="#">
      <b-button v-b-toggle.sidebar-backdrop variant="info"><b-icon icon="layout-text-sidebar"> </b-icon></b-button>
    </b-navbar-brand>
    <b-sidebar
      id="sidebar-backdrop"
      title="Menu"
      backdrop
      shadow
    >
      <div class="px-6 py-5">
          <b-list-group-item href="/eletronicos">Eletrodomesticos</b-list-group-item>
          <b-list-group-item href="/marcas">Marcas</b-list-group-item>
      </div>
    </b-sidebar>
  </b-navbar>
</template>

<script>
export default {
  name: 'Menu',
  props: {
    msg: String
  }
}
</script>
<style>
  .list-group-item{
    border: none;
  }
  .list-group-item {
    position: relative;
    display: block;
    padding: 0.5rem 1rem;
    color: #212529;
    text-decoration: none;
  }
</style>