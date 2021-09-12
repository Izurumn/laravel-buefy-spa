<template>
  <div>
    <div :class="modal_add">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add category</p>
      <button @click="close()" class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" v-model="name" type="text" placeholder="Ангилал нэр">
        </div>
      </div>
      <div class="field">
        <label class="label">Server</label>
      <div class="select">
        <select v-model="servers_id">
          <option v-for="server in servers" v-bind:value="server.id">{{server.name}}</option>
        </select>
      </div>
    </div>
    </section>
    <footer class="modal-card-foot">
      <button @click="create()" class="button is-success">Create</button>
      <button @click="close()" class="button">Cancel</button>
    </footer>
  </div>
</div>
<div :class="modal_edi">
<div class="modal-background"></div>
<div class="modal-card">
<header class="modal-card-head">
  <p class="modal-card-title">Edit category</p>
  <button @click="close()" class="delete" aria-label="close"></button>
</header>
<section class="modal-card-body">
  <div class="field">
    <label class="label">Name</label>
    <div class="control">
      <input class="input" v-model="name" type="text" placeholder="Сервер нэр">
    </div>
  </div>
  <div class="field">
    <label class="label">Server</label>
  <div class="select">
    <select v-model="servers_id">
      <option v-for="server in servers" v-bind:value="server.id">{{server.name}}</option>
    </select>
  </div>
</div>
</section>
<footer class="modal-card-foot">
  <button @click="edit()" class="button is-success">Update</button>
  <button @click="close()" class="button">Cancel</button>
</footer>
</div>
</div>
    <div class="buttons">
  <button @click="modal_open1()" class="button is-primary">Ангилал нэмэх</button>
</div>
<div class="tabs is-centered">
  <ul>
    <li v-for="server in servers" :key="server.id"><a @click="serverfetch(server)">{{server.name}}</a></li>
  </ul>
</div>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Server</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Server</th>
        <th>Actions</th>
      </tr>
    </tfoot>
    <tbody>
      <tr v-for="category in categories" :key="category.id">
        <td>{{category.id}}</td>
        <td>{{category.name}}</td>
        <td>{{category.serversname}}</td>
        <td>
          <button @click="modal_open2(category)"><unicon name="edit" fill="green" width="32px" height="32px"  /></button>
          <button @click="del(category)"><unicon name="trash" fill="red" width="32px" height="32px" /></button></td>
      </tr>
    </tbody>
  </table>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      id: '',
      name: '',
      servers_id: 1,
      modal_add: 'modal',
      modal_edi: 'modal',
      categories: [],
      servers: [],
      server_first: [{id: 1}]
    }
  },
  methods: {
    modal_open1() {
      this.modal_add = 'modal is-active'
    },
    modal_open2(category) {
      this.modal_edi = 'modal is-active'
      this.name = category.name
      this.servers_id = category.servers_id
      this.id = category.id
    },
    close() {
      this.modal_add = 'modal'
      this.modal_edi = 'modal'
      this.name = ''
      this.servers_id = ''
      this.id = ''
    },
    del(category) {
      let uri = 'api/admin/categories/delete/' + category.id;
      let formData = new FormData()
       formData.append('id', category.id)
       if(confirm('are you sure?'))
       axios.post(uri, formData)
       .then(response => {
         this.close();
         this.serverfetch(this.servers[0]);
       })
    },
    create() {
      let uri = 'api/admin/categories/create/';
      let formData = new FormData()
       formData.append('name', this.name)
       formData.append('servers_id', this.servers_id)
       axios.post(uri, formData)
   .then(response => {
     this.serverfetch(this.servers[0])
     this.close()
   })
    },
    edit() {
      let uri = 'api/admin/categories/update/';
      let formData = new FormData()
      formData.append('id', this.id)
       formData.append('name', this.name)
       formData.append('servers_id', this.servers_id)
       axios.post(uri, formData)
       .then(response => {
         this.serverfetch(this.servers[0])
         this.close()
       })
 },
    serverfetch(server) {
      let uri = 'api/admin/categories/' + server.id;
      this.axios.get(uri).then(response => {
        this.categories = response.data.categories;
      });
    }
  },
  created() {

    let uri = 'api/admin/servers';
    this.axios.get(uri).then(response => {
      this.servers = response.data.servers;
    this.serverfetch(this.servers[0])
    });

  }
}
</script>
