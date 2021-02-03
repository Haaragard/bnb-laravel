require("./bootstrap");

import moment from "moment";
import VueRouter from "vue-router";
import router from "./routes";
import Index from "./Index";

import StarRating from "./shared/components/StarRating";

window.Vue = require("vue").default;

Vue.use(VueRouter);

Vue.filter("fromNow", value => moment(value).fromNow());

Vue.component("StarRating", StarRating);

const app = new Vue({
    el: "#app",
    router,
    components: {
        index: Index
    }
});
