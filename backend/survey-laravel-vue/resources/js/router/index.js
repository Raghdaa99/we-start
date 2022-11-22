import {createRouter, createWebHistory} from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import AuthLayout from "../components/AuthLayout.vue";
import Surveys from "../views/Surveys.vue";
import Login from "../views/Login.vue";
import SurveyView from "../views/SurveyView.vue";
import Register from "../views/Register.vue";
import NotFound from "../views/NotFound.vue";
import {useStore} from "../stores";
import DefaultLayout from "../components/DefaultLayout.vue";

const routes = [
    {
        path: "/",
        redirect: "/dashboard",
        name: "DashboardA",
        component: DefaultLayout,
        meta: {requiresAuth: true},
        //if user try to access dashboard but not have authorization it direct to login page,
        children: [
            {path: '/dashboard', name: "Dashboard", component: Dashboard},
            {path: '/surveys', name: "Surveys", component: Surveys},
            { path: '/surveys/create', name: "SurveyCreate", component: SurveyView },
            { path: '/surveys/:id', name: "SurveyView", component: SurveyView },
        ]
    },
    {
        path: '/auth',
        redirect: '/login',
        name: 'Auth',
        component: AuthLayout,
        meta: {isGuest: true},
        children: [
            {
                path: "/login",
                name: "Login",
                component: Login,
            },
            {
                path: "/register",
                name: "Register",
                component: Register,
            },
        ]
    },
    {path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound},
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    const userStore = useStore();
    if ((to.meta.requiresAuth) && !userStore.user.token) { // if user not have token
        next({name: 'Login'})
    } else if (userStore.user.token && (to.meta.isGuest)) {
        next({name: 'Dashboard'});
    } else {
        next();
    }
})
export default router;
