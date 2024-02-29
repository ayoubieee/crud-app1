import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import itemsView from '../views/items/view.vue';
import itemsCreate from '../views/items/create.vue';
import itemsEdit from '../views/items/edit.vue';

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
      name: 'items',
      component: itemsView
    },
    {
      path: '/items/create',
      name: 'itemsCreate',
      component: itemsCreate
    },
    {
      path: '/items/:id/edit', // Corrected path with ':id'
      name: 'itemsEdit',
      component: itemsEdit
    }
  ]
});

export default router;
