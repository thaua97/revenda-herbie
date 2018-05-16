import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import 'vuetify/es5/util/colors'

Vue.use(Vuetify)

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('Home', require('./components/Home.vue'));


const app = new Vue({
    el: '#app'
});
