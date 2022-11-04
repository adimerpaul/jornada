import indexPage from "pages/IndexPage";
import Login from "pages/Login";
import Cupo from "pages/Cupo";
import Registro from "pages/Registro";

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: indexPage ,meta: {requiresAuth: true}},
      { path: 'cupo', component: Cupo ,meta: {requiresAuth: true}},

    ]
  },
  {
    path: '/login',
    component: Login
  },
  { path: '/registro/:id', component: Registro ,meta: {requiresAuth: true}},
  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
