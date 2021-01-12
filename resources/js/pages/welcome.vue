<template>
  <div>
  <section class="hero container is-medium blg">
    <div class="hero-body bbar">
      <div class="container">
        <h1 class="title">Nexus сайтад тавтай морил</h1>
        <h3 class="title is-5">
          Байнгын шинэчлэлт, маш олон төрлийн сервер,<br> Монголын хамгийн олон тоглогчтой серверт нэгдэхэд бэлэн үү?
          <br>
      </h3>
      <b-button class="is-light" size="is-large" tag="a" href="http://mc00.animax.mn/dl/Minecraft.exe" target="_blank">
        MINECRAFT ТАТАХ
      </b-button>
      </div>
    </div>
  </section>
  <div class="container">
  <article class="message" v-for="posts in post"
   :key="post.id" >
<div class="message-header">
  {{posts.title}}
</div>
<div class="message-body" v-html="posts.body">

</div>
</article>
</div>
<footer class="footer">
  <div class="content has-text-centered">
    <p>
      <a href="">Facebook</a>
      <a href="">Discord</a>
    </p>
  </div>
</footer>
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

  layout: 'basic',
  methods: {
    success() {
    this.$buefy.notification.open({
        message: 'Амжилттай IP хууллаа!',
        type: 'is-success'
    })

},



onCopy: function (e) {
  success();
},
onError: function (e) {
  alert('Failed to copy texts')
}
},
created() {
  axios
  .get('api/server')
  .then(response => {
    this.server = response.data;
  });
  let uri = 'api/posts';
  this.axios.get(uri).then(response => {
    this.post = response.data.posts;
  });
},
  components: {
    Navbar
  },
  metaInfo () {
    return { title: this.$t('Нүүр') }
  },



  computed: mapGetters({
    authenticated: 'auth/check',

  })
}

</script>
