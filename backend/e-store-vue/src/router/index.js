import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import { useStore } from '../stores/user'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/shop',
      name: 'shop',
      component: () => import('../views/ShopView.vue')
    },
    {
      path: '/contact',
      name: 'contact',
      component: () => import('../views/ContactView.vue')
    },
    {
      path: '/cart',
      name: 'cart',
      component: () => import('../views/CartView.vue'),
      meta: {requiresAuth: true},
    },
    {
      path: "/login",
      name: "Login",
      component: () => import('../views/loginView.vue'),
      meta: {isGuest: true},
    },
    {
      path: "/register",
      name: "Register",
      component: () => import('../views/RegisterView.vue'),
      meta: {isGuest: true},
    },

    { path: '/:pathMatch(.*)*', name: 'NotFound', component: () => import('../views/AboutView.vue') },
  ]
})


router.beforeEach((to, from, next) => {
  const userStore = useStore();
  if ((to.meta.requiresAuth) && !userStore.user.token) { // if user not have token
      next({name: 'Login'})
  } else if (userStore.user.token && (to.meta.isGuest)) {
      next({name: 'home'});
  } else {
      next();
  }
})
export default router
