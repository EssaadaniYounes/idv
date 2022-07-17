import Vue from 'vue'
import VueRouter from 'vue-router'
import Views from '../views'

Vue.use(VueRouter)

const routes = [
  {
    path: '/admin/',
    name: 'Login',
    component: Views.Login
  },
  {
    path: '/admin/categories',
    name: 'Categories',
    component: Views.Categories
  },
  {
    path: '/admin/products',
    name: 'Products',
    component: Views.Products
  },
  {
    path: '/admin/products/product/:id?',
    name: 'AddProduct',
    component: Views.AddProduct,
    props: true
  },
  {
    path: '/admin/branches',
    name: 'Branches',
    component: Views.Branches
  }, {
        path: '/admin/branches/:id?',
        name: 'UpdateBrand',
        component: Views.UpdateBrand,
        props:true
    },
]


const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
