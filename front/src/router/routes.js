import indexPage from "pages/IndexPage";
import Login from "pages/Login";
import Cupo from "pages/Cupo";
import Registro from "pages/Registro";
import Credencial from "pages/Credencial";
import Certificado from "pages/Certificado";
import Material from "pages/Material";
import Refrigerio from "pages/Refrigerio";
import Estudiantes from "pages/Estudiantes";
import User from "pages/User";
import Evento from "pages/Evento/Evento.vue";
import RegistroEvento from "pages/Evento/RegistroEvento.vue";
import ShowEvento from "pages/Evento/ShowEvento.vue";

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: indexPage ,meta: {requiresAuth: true}},
      { path: 'cupo', component: Cupo ,meta: {requiresAuth: true}},
      { path: 'credencial', component: Credencial ,meta: {requiresAuth: true}},
      { path: 'certificado', component: Certificado,meta: {requiresAuth: true}},
      { path: 'material', component: Material,meta: {requiresAuth: true}},
      { path: 'refrigerio', component: Refrigerio,meta: {requiresAuth: true}},
      { path: 'estudiantes', component: Estudiantes,meta: {requiresAuth: true}},
      { path: 'user', component: User,meta: {requiresAuth: true}},
      { path: 'evento', component: Evento,meta: {requiresAuth: true}},
      { path: 'eventoShow/:id', component: ShowEvento,meta: {requiresAuth: true}},
    ]
  },
  {
    path: '/login',
    component: Login
  },
  { path: '/registro/:id', component: Registro},
  { path: '/evento/:id', component: RegistroEvento},
  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
