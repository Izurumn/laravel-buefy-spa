<template>
<div class="hero">
  <div class="columns is-centered">
    <div class="column is-half">
        <h1 class="title">
          Худалдаж авах ранкны сервер сонгох
        </h1>
        <br><br>
        </div>
        </div>
<div class="cards-list2">
<div class="card2 1" v-for="servers in server"
 :key="servers.id">
<router-link :to="{name: 'server', params: { id: servers.id }}" tag="div" class="card_image">
 <img src="/img/mc.gif" /> </router-link>
  <div class="card_title title-white">

      <p class="pa">{{servers.name}}</p>

  </div>
</div>


</div>
</div>

</div>


</template>
<style>
#dark {
  background-color: rgb(22, 22, 29);
}
.pa {
    font-family: SANS-SERIF;
    font-size: 22px;
    line-height: 1.7;
    color: white;
    margin: 0px;
}
.cards-list2 {
  z-index: 0;
  width: 100%;
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.card2 {
  margin: 30px auto;
  width: 300px;
  height: 300px;
  border-radius: 40px;
box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);
  cursor: pointer;
  transition: 0.4s;
}

.card2 .card_image {
  width: inherit;
  height: inherit;
  border-radius: 40px;
}

.card2 .card_image img {
  width: inherit;
  height: inherit;
  border-radius: 40px;
  object-fit: cover;
}

.card2 .card_title {
  text-align: center;
  border-radius: 0px 0px 40px 40px;
  font-family: sans-serif;
  font-weight: bold;
  font-size: 30px;
  margin-top: -80px;
  height: 40px;
}

.card2:hover {
  transform: scale(0.9, 0.9);
  box-shadow: 5px 5px 30px 15px rgba(0,0,0,0.25),
    -5px -5px 30px 15px rgba(0,0,0,0.22);
}

.title-white {
  color: white;
}

.title-black {
  color: black;
}

@media all and (max-width: 500px) {
  .card-list2 {
    /* On small screens, we are no longer using row direction but column */
    flex-direction: column;
  }
}


/*
.card {
  margin: 30px auto;
  width: 300px;
  height: 300px;
  border-radius: 40px;
  background-image: url('https://i.redd.it/b3esnz5ra34y.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  background-repeat: no-repeat;
box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);
  transition: 0.4s;
}
*/
</style>
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
  let uri = 'api/servers';
  this.axios.get(uri).then(response => {
    this.server = response.data.server;
  });
}
}
</script>
