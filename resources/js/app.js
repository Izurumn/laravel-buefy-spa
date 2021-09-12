import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import Buefy from 'buefy'
import VueClipboard from 'vue-clipboard2'
import '~/plugins'
import '~/components'
import axios from 'axios'
import VueAxios from 'vue-axios'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faHome, faStore, faBan, faAtlas, faAddressBook, faLightbulb, faRegistered, faCaretSquareDown} from '@fortawesome/free-solid-svg-icons'
library.add(faHome, faStore, faBan, faAtlas, faAddressBook, faLightbulb, faRegistered, faCaretSquareDown)
import Unicon from 'vue-unicons'
import { uniPlay, uniTrash, uniEdit, uniFacebook, uniUserSquare, uniInstagram, uniDiscord, uniHome, uniStore, uniBook, uniBan } from 'vue-unicons/src/icons'
var VueCookie = require('vue-cookie');
// Tell Vue to use the plugin
Vue.use(VueCookie);
Vue.component('font-awesome-icon', FontAwesomeIcon)
Unicon.add([uniPlay, uniTrash, uniEdit, uniFacebook, uniUserSquare, uniInstagram, uniDiscord, uniHome, uniStore, uniBook, uniBan ])
Vue.use(Unicon)

Vue.config.productionTip = false
Vue.use(Buefy)

Vue.use(VueAxios, axios)
axios.defaults.baseURL = '/'
import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use(CKEditor);

Vue.use(VueClipboard)
Vue.use(Buefy, {
  defaultIconComponent: 'vue-fontawesome',
  defaultIconPack: 'fas',
});
/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
