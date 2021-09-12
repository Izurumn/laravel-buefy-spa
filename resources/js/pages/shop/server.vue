<template>
  <div class="container-3">
    <div v-if="!items.length" class="columns is-mobile is-centered">
      <div class="column is-half">
        <div class="notification is-primary">
          Одоогоор ранк ороогүй байна.
        </div>
      </div>
    </div>
<div :class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">{{name}}</p>
      <button class="delete" aria-label="close" @click="close()"></button>
    </header>
    <section class="modal-card-body">
      <!-- Content ... -->
    </section>
  </div>
</div>

    <div class="columns is-multiline is-centered">
      <div class="column is-three-quarters">
        <div class="columns is-multiline">
          <div class="column is-half-mobile is-half-tablet is-3-desktop is-3-widescreen is-3-fullhd" v-for="item in items" :key="item.id">
        <div class="card" >
          <div class="card-image">
            <figure class="image is-4by3">
              <img :src="item.url" alt="Placeholder image">
            </figure>
          </div>
          <div class="card-content">
            <div class="content">
            {{item.name}}
              <br>
              <b> {{item.price}} MNT</b>
              <br>
              <div class="buttons">
                <button class="button is-primary is-small" @click="open(item)">?</button>
                <button class="button is-link is-small"><router-link :to="{ name: 'transfer', params: {id: item.id} }">Худалдаж авах</router-link></button>
            </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
      <div class="column">
        <div class="card">
          <div v-for="server in servers" :key="server.id" >
        <a class="panel-block is-active" @click="servermake(server)">
          <img class="server-img" :src="server.url" />
          <font class="sdb">{{server.name}} </font> <font-awesome-icon class="server-icon" icon="caret-square-down" />
        </a>
        <div class="dropdown-content" v-show="server.make">
        <a class="dropdown-item"  @click="push(category.id)" v-for="category in categories" :key="category.id" v-if="category.servers_id == server.id"
        >
      {{category.name}}
      </a>
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
  metaInfo () {
    return { title: 'Ранк' }
  },
  data() {
    return {
      items: [],
      modal: 'modal',
      name: '',
      survival: false,
      categories: [],
      servers: []
    }
  },
  created() {
    this.shop_category()
    this.shop_server()
  let uri = 'api/category/' + this.$route.params.id;
  this.axios.get(uri).then(response => {
    this.items = response.data.items;
  });
},
methods: {
  push(item) {
    let uri = 'api/category/' + item;
    this.axios.get(uri).then(response => {
      this.items = response.data.items;
    });
  },
  open(item) {
    this.modal = 'modal is-active'
    this.name = item.name
  },
  close() {
    this.modal = 'modal'
    this.name = ''
  },
  shop_category() {
    let uri = 'api/shop_category';
    this.axios.get(uri).then(response => {
      this.categories = response.data.items;
    });
  },
  shop_server() {
    let uri = 'api/shop_server';
    this.axios.get(uri).then(response => {
      this.servers = response.data.items;
    });
  },
  servermake(server) {
    if(server.make==1) {

      $.each(this.servers, (key, value)=> {
      value.make = 0;
      });
    }
    else {
      $.each(this.servers, (key, value)=> {
      value.make = 0;
      if(value.id==server.id) {
      value.make = 1;
      }
      });
    }
  }
}
}
</script>
