import Vue from 'vue'
import Router from 'vue-router'
import API from '@/components/API'
import Test from '@/components/Test'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Test',
      component: Test
    }, {
      path: '/api',
      name: 'API',
      component: API
    }
  ]
})
