import './bootstrap';

window.Vue = require('vue');

/*Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('crud')*/

import ExampleComponent from './components/ExampleComponent'

let root = new Vue({
    el: "#root",
    components: {
        ExampleComponent
    },
    render: h => h(ExampleComponent)
}).$mount(ExampleComponent)
