<template>
  <section class="section">
    <div class="columns">
    <div class="column is-one-quarter">
      <section>
      <div class="sidebar-page">
        <section class="sidebar-layout" style="background: white;">
                    <b-menu class="is-custom-mobile">
                        <b-menu-list label="Menu">
              <router-link :to="{name: 'admin.posts'}"><b-menu-item icon="information-outline" label="Posts"></b-menu-item></router-link>
                            <b-menu-item active expanded icon="settings" label="Захиалга">
              <router-link :to="{name: 'admin.home'}"><b-menu-item icon="account" label="Дуусаагүй"></b-menu-item></router-link>
              <router-link :to="{name: 'admin.completes'}"><b-menu-item icon="cellphone-link" label="Дууссан"></b-menu-item></router-link>
                                <b-menu-item icon="cash-multiple" label="Нийт орлого(chart)" disabled></b-menu-item>
                            </b-menu-item>
                            <b-menu-item active expanded icon="settings" label="Ранк">
                                <router-link :to="{name: 'admin.ranks'}"><b-menu-item icon="account" label="Ранк жагсаалт"></b-menu-item></router-link>
                                <router-link :to="{name: 'admin.servers'}"><b-menu-item icon="cellphone-link" label="Сервер жагсаалт"></b-menu-item></router-link>
                                <b-menu-item icon="cash-multiple" label="Нэмэлт" disabled></b-menu-item>
                            </b-menu-item>
                        </b-menu-list>
                        <b-menu-list>
                            <b-menu-item label="Expo" icon="link"></b-menu-item>
                        </b-menu-list>
              <b-button @click="logout()"><b-menu-item icon="logout" label="Гарах"></b-menu-item></b-button>
                        </b-menu>


        </section>
    </div>
  </section>
  </div>
  <div class="column">
    <transition name="fade" mode="out-in">
      <router-view />
    </transition>
  </div>
</div>
  </section>
</template>
<script type="text/javascript">
window.axios = require('axios');
import Vue from 'vue'
import router from '~/router'
export default {

   methods: {
     logout() {
axios.post('api/logout').then(response => {
        localStorage.removeItem('auth_token');

        // remove any other authenticated user data you put in local storage

        // Assuming that you set this earlier for subsequent Ajax request at some point like so:
        // axios.defaults.headers.common['Authorization'] = 'Bearer ' + auth_token ;
        delete axios.defaults.headers.common['Authorization'];

        // If using 'vue-router' redirect to login page
        this.$router.go('/');
      })
    }
  }
  }
</script>
