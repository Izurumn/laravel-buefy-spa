<template>
  <section class="section">
    <div class="columns">
    <div class="column is-one-quarter">
      <section>
        <article class="panel is-info">
          <p class="panel-heading">
            Menu
          </p>
          <a class="panel-block">
            <span class="panel-icon">
              <i class="fas fa-book" aria-hidden="true"></i>
            </span>
            <router-link :to="{ name: 'admin.orders' }">Orders</router-link>
          </a>
          <a class="panel-block">
            <span class="panel-icon">
              <i class="fas fa-book" aria-hidden="true"></i>
            </span>
            <router-link :to="{ name: 'admin.items' }">Items</router-link>
          </a>
          <a class="panel-block">
            <span class="panel-icon">
              <i class="fas fa-book" aria-hidden="true"></i>
            </span>
            <router-link :to="{ name: 'admin.servers' }">Servers</router-link>
          </a>
          <a class="panel-block">
            <span class="panel-icon">
              <i class="fas fa-book" aria-hidden="true"></i>
            </span>
            <router-link :to="{ name: 'admin.categories' }">Categories</router-link>
          </a>
          <a class="panel-block">
            <span class="panel-icon">
              <i class="fas fa-book" aria-hidden="true"></i>
            </span>
            <router-link :to="{ name: 'admin.posts' }">Posts</router-link>
          </a>
        </article>
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
import { mapGetters } from 'vuex'
export default {
  middleware: 'admin',
      middleware: 'auth',
  computed: mapGetters({
  user: 'auth/user'
}),
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
