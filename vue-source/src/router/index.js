import Vue from 'vue'
import Router from 'vue-router'
import Manager from '@/components/manager/Manager'
import ManagerCase from  '@/components/manager/case/Case'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/manager',
            name: 'Manager',
            component: Manager
        },
        {
            path: '/manager-case',
            name: 'ManagerCase',
            component: ManagerCase
        }
    ]
})
