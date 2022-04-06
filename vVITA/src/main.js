// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.

import Vue from 'vue'
import App from './App'
//import router from './router' //Komentohet pasi deklarohet si konstat
import VueRouter from 'vue-router'
import vueResource from 'vue-resource'
import Dairies_vita from './components/Dairies_vita'
import About from './components/About'
import Add from './components/Add'
import Edit from './components/Edit'



Vue.use(vueResource)
Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	base: __dirname,
	routes: [
	{path:'/', component: Dairies_vita},
	{path: '/about', component: About},
	{path: '/add', component: Add},
	{path: '/edit/:id_dairyVITA', component: Edit},
	]
})
Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  router,
  template: `
<div id="app"> 

<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">vVITA</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><router-link to="/">Home</router-link></li>
            <li><router-link to="/about">About Us</router-link></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><router-link to="/add">Add Dairy</router-link></li>
	</ul>

        </div>
      </div>
    </nav>
<router-view></router-view>
</div>`
}).$mount('#app')

