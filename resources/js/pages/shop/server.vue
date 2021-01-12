<template>
  <div class="hero is-fullheight">
  <div class="columns is-multiline">
    <div class="column" v-for="servers in server"
     :key="servers.id"
    >

<div class="slide-container">
<div class="wrapper">
<div class="clash-card barbarian">
<div class="clash-card__image clash-card__image--barbarian">
<img src="/img/card.png" alt="barbarian" />
</div>
<div class="clash-card__level clash-card__level--barbarian">Сервер: {{servers.name}} </div>
<div class="clash-card__unit-name">{{servers.title }}</div>
<div class="clash-card__unit-description">
{{servers.description}}
</div>
<div class="clash-card__unit-stats clash-card__unit-stats--barbarian clearfix">
<div class="one-third stat-margin">
<div class="stat">
        <router-link :to="{name: 'shopitem', params: { id: servers.id }}">
      <button class="bb-button">Авах</button>
      </router-link>
    </div>

</div>

<div class="one-width no-border">
  <div class="stat-value ">Үнэ:</div>
<div class="stat">{{ servers.price }} ₮</div>

</div>
</div>
</div>
</div>

</div>
    </div>
  </div>
</div>
</template>

<script>
import Vue from 'vue'
export default {
  data() {
    return {
      server: [],

    }
  },
  created() {
//  let uri = '/anime/' + this.$route.params.slug + '/episode/' + this.$route.params.Dugaar;
  let uri = 'api/shop/server/' + this.$route.params.id;
  this.axios.get(uri).then(response => {
    this.server = response.data.server;
  });
}
}
</script>
