import Vue from 'vue'
import VueRouter from 'vue-router'
import TicketCreate from './components/tickets/TicketCreate'
import TicketList from './components/tickets/TicketList'
import TicketShow from './components/tickets/TicketShow'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'TicketCreate',
        component: TicketCreate
    },
    {
        path: '/tickets',
        name: 'TicketList',
        component: TicketList
    },
    {
        path: '/tickets/:id',
        name: 'TicketShow',
        component: TicketShow
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
