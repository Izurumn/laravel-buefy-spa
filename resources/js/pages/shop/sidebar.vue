<template>
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
    push(item) {
      this.$router.push('/category/' + item)
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
