import { createRouter, createWebHashHistory } from "vue-router"
import { baseRoutes } from "./base"


const routes = [
    ...baseRoutes
]

const router = createRouter({
    history: createWebHashHistory(import.meta.env.VITE_API_URL),
    routes,
    scrollBehavior(to, from, savedPosition) {
        return savedPosition || { top: 0 }
    },
});

//router.beforeEach(async (to) => {
//    const user = JSON.parse(localStorage.getItem('User'))
//
//    const publicPages = ['/login', '/register', '/socialite']
//    const authRequired = !publicPages.includes(to.path) && !(user && user.token)
//
//    const allowedPaths = ['/create-or-attach', '/attach-company', '/create-company', '/company', '/user-is-blocked']
//    const goToCompanyCreate = !allowedPaths.includes(to.path) && (user && user.token && user.company === null)
//
//    if (authRequired) {
//        return '/login'
//    }
//
//    if (goToCompanyCreate) {
//        return '/create-or-attach'
//    }
//})

export default router
