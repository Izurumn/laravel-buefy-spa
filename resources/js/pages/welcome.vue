<template>
  <div class="container-3">
    <section class="section">
      <div class="mctitle">
      <h1 class="title is-1">MC.NEXUS.MN</h1>
    </div>
      <h2 class="subtitle">
        {{server.players_now}} тоглогч серверт байна.
      </h2>
            <div class="button is-large is-success"><a href="https://cloud.homenet.mn/s/f9oiX25HTZmd3BG">MINECRAFT ТАТАХ</a></div>.
    </section>

  <div class="columns">
    <div class="column is-full-mobile is-full-tablet is-two-thirds-desktop is-two-thirds-widescreen is-two-thirds-fullhd">
      <div class="card">
      <header class="card-header">
      <p class="card-header-title">
        Шинэчлэлт
      </p>
    </header>
  </div>
  <div style="background-color:#2c2c3c;padding:25px;">
    <article class="media" v-for="posts in post" :key="post.id" >
      <figure class="media-left">
        <p class="image is-64x64">
          <img src="/images/grass-b.png">
        </p>
      </figure>
      <div class="media-content">
        <div class="content">
          <p>
            <strong>{{posts.title}}</strong>
            <br>
            <font v-html="posts.body"> </font>
               </p>
        </div>
      </div>
      <div class="media-right">
        {{posts.created_at}}
      </div>
    </article>
  </div>
</div>
<div class="column">
  <div class="card">
  <header class="card-header">
    <p class="card-header-title">
      Сервер
    </p>

  </header>
  <div class="card-content">
    <div class="content dflex">
    <div class="thumb-s">
      <img src="/images/dirtblock.png">
    </div>
    <div class="serverinfo thumb-s">
      <h5>Nexus Minecraft</h5>
      <small>{{server.players_now}} тоглогч серверт байна.</small>
    </div>
    <div class="button is-small is-success is-light" style="margin-left:auto"
    v-clipboard:copy="message"
      v-clipboard:success="onCopy"
      v-clipboard:error="onError">
      IP ХУУЛАХ
    </div>
    </div>
  </div>
  <div class="card-content">
    <div class="content dflex">
    <div class="thumb-s">
      <img src="/images/discord.png">
    </div>
    <div class="serverinfo thumb-s">
      <h5>Nexus Discord</h5>
      <small>{{server.discord}} хэрэглэгч серверт байна.</small>
    </div>
    <div class="button is-small is-link is-light" style="margin-left:auto">
      <a href="https://mc.nexus.mn/discord">НЭГДЭХ</a>
    </div>
    </div>
  </div>
</div>
</div>

</div>

</div>
</template>
<style>
.s2 {
  color:white;
}
.p-1 {
  padding: 1em;
}

</style>
<script>
import { mapGetters } from 'vuex'
import Navbar from '~/components/Navbar'
window.axios = require('axios');
import Vue from 'vue'
import router from '~/router'

export default {
  data: () => ({
    title: window.config.appName,
    message: 'mc.animax.mn',
    server: [],
    post: []
  }),

  methods: {
    success() {
    this.$buefy.notification.open({
        message: 'Амжилттай IP хууллаа!',
        type: 'is-success'
    })

},



onCopy: function (e) {
  this.success();
},
onError: function (e) {
  alert('Failed to copy texts')
}
},
created() {
  let uri = 'api/posts';
  this.axios.get(uri).then(response => {
    this.post = response.data.posts;
  });
  axios
  .get('api/nexus')
  .then(response => {
    this.server = response.data;
  });

},
  components: {
    Navbar
  },
  metaInfo () {
    return { title: 'Нүүр' }
  },



  computed: mapGetters({
    authenticated: 'auth/check',

  })
}

</script>
