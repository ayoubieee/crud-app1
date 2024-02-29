import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import itemsView from '../views/items/view.vue'
import itemsCreate from '../views/items/create.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/items',
      name: 'item',
      component: () => import('../views/items/view.vue')
    },
    {
      path: '/items/create',
      name: 'itemsCreate',
      component: itemsCreate
    },
  ]
})

export default router
