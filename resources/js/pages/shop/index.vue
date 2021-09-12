<template>
  <div class="container">
    <transition name="fade" mode="out-in">
      <router-view />
    </transition>
    <div class="column">
        <div class="card">
          <div v-for="server in servers" :key="server.id" >
        <a class="panel-block is-active" @click="server.make = !server.make">
          <img width="80" src="https://jartexnetwork.com/dist/img/house-125.png" />
          <font class="sdb">{{server.name}}</font>
        </a>
        <div class="dropdown-content" v-show="server.make">
      <a v-for="category in categories" :key="category.id" v-if="category.servers_id == server.id" class="dropdown-item" @click="update_url(category.id)">
        {{category.name}}
      </a>
    </div>
    </div>
    </div>

</div>
</div>
</template>

<script>
export default {
  data() {
    return {
      survival: false,
      categories: [],
      servers: []
    }
  },
  created() {
    this.shop_category()
    this.shop_server()
  },
  methods: {
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
    update_url(item) {
      history.pushState(null, null, '/category/' + item);
    }
  }
}
</script>
