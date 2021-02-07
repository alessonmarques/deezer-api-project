import Vue from 'vue';

import ExampleComponent from './components/ExampleComponent.vue'

new Vue({
    el: '#app',

    components: {
        ExampleComponent // ExampleComponent: example-component
    },

    data: {
        'title': 'teste'
    }
});
