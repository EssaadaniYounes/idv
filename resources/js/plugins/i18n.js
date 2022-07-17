import { messages } from "../assets/i18n";
import VueI18n from "vue-i18n";

import Vue from 'vue'

Vue.use(VueI18n)
const i18n = new VueI18n({
    locale: 'en', // set locale
    messages:messages
})
export default i18n
