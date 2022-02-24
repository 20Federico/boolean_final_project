/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from "vue";
import store from "./store";
require("./bootstrap");
require("./scripts");
window.Vue = require("axios");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("chart-component", require("./components/Chart.vue").default);
Vue.component("hero-section", require("./components/HeroSection.vue").default);
Vue.component("home-page", require("./components/HomePage.vue").default);
Vue.component(
    "searched-view",
    require("./components/SearchedView.vue").default
);
Vue.component(
    "search-filters",
    require("./components/SearchFilters.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    store,
    el: "#app",
    data() {

      return {
        searching: false,
        search: {},
        editImgVisible: true
      }

    },
    methods: {
        getQuery(value) {
            this.search = value;
        },
    },
});
