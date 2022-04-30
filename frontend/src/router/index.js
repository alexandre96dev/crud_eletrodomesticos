import Vue from 'vue'
import VueRouter from 'vue-router'
import Eletrodomesticos from '../views/Eletrodomesticos.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Eletrodomesticos',
    component: Eletrodomesticos
  },
  {
    path: '/marcas',
    name: 'marcas',
    // route level code-splitting
    // this generates a separate chunk (marcas.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "marcas" */ '../views/Marcas.vue')
  }
]

const router = new VueRouter({
  routes
})

export default router
