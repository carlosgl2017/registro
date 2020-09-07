
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


//Vue.component('rol', require('./components/Rol.vue'));
Vue.component('registro', require('./components/Registro.vue'));
Vue.component('ingreso', require('./components/Ingreso.vue'));
Vue.component('credito', require('./components/Credito.vue'));
Vue.component('persona', require('./components/Persona.vue'));
Vue.component('conyugue', require('./components/Conyugue.vue'));
Vue.component('success', require('./components/Success.vue'));
Vue.component('otroingreso', require('./components/Otroingreso.vue'));
Vue.component('otroprestamo', require('./components/Otroprestamo.vue'));
Vue.component('prestamo', require('./components/Prestamo.vue'));
Vue.component('bien', require('./components/Bien.vue'));
Vue.component('spinner', require('./components/Spinner.vue'));
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)
const app = new Vue({
    el: '#app',
    data:{
        menu:3
    },
  methods: {
    reRender() {
      this.$forceUpdate()
    },
    updateMenu(newValue) {
      this.menu = newValue  // 3.Updating
    }
  }
});
  