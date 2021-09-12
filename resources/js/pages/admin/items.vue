<template>
  <div>
    <div :class="modal_add">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add item</p>
      <button @click="close()" class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" v-model="name" type="text" placeholder="Item name">
        </div>
      </div>
      <div class="field">
        <label class="label">Price</label>
        <div class="control">
          <input class="input" v-model="price" type="text" placeholder="Үнэ">
        </div>
      </div>
      <div class="field">
        <label class="label">Sale</label>
        <div class="control">
          <input class="input" v-model="sale" type="text" placeholder="Sale price %">
        </div>
      </div>
      <div class="field">
        <label class="label">Description</label>
        <div class="control">
          <input class="input" v-model="desc" type="text" placeholder="Description">
        </div>
      </div>
      <div class="field">
        <label class="label">Command</label>
        <div class="control">
          <input class="input" v-model="command" type="text" placeholder="Description">
        </div>
      </div>
      <div class="field">
        <label class="label">Image</label>
        <div class="file">
        <label class="file-label">
          <input class="file-input" type="file" @change="onFileChange">
          <span class="file-cta">
            <span class="file-icon">
              <i class="fas fa-upload"></i>
            </span>
            <span class="file-label">
              Choose a file…
            </span>
          </span>
        </label>
        <div id="preview">
        <img v-if="url" :src="url" />
      </div>
      </div>
    </div>
    <div class="field">
      <label class="label">Server</label>
    <div class="select">
      <select v-model="servers_id" @change="filter">
        <option v-for="server in servers" v-bind:value="server.id">{{server.name}}</option>
      </select>
    </div>
  </div>
  <div class="field">
    <label class="label">Categories</label>
  <div class="select">
    <select v-model="categories_id">
      <option v-for="category in categories" v-bind:value="category.id">{{category.name}}</option>
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
  <p class="modal-card-title">Edit item</p>
  <button @click="close()" class="delete" aria-label="close"></button>
</header>
<section class="modal-card-body">
  <div class="field">
    <label class="label">Name</label>
    <div class="control">
      <input class="input" v-model="name" type="text" placeholder="Item name">
    </div>
  </div>
  <div class="field">
    <label class="label">Price</label>
    <div class="control">
      <input class="input" v-model="price" type="text" placeholder="Үнэ">
    </div>
  </div>
  <div class="field">
    <label class="label">Sale</label>
    <div class="control">
      <input class="input" v-model="sale" type="text" placeholder="Sale price %">
    </div>
  </div>
  <div class="field">
    <label class="label">Description</label>
    <div class="control">
      <input class="input" v-model="desc" type="text" placeholder="Description">
    </div>
  </div>
  <div class="field">
    <label class="label">Command</label>
    <div class="control">
      <input class="input" v-model="command" type="text" placeholder="Description">
    </div>
  </div>
  <div class="field">
    <label class="label">Image</label>
    <div class="file">
    <label class="file-label">
      <input class="file-input" type="file" @change="onFileChange">
      <span class="file-cta">
        <span class="file-icon">
          <i class="fas fa-upload"></i>
        </span>
        <span class="file-label">
          Choose a file…
        </span>
      </span>
    </label>
    <div id="preview">
    <img v-if="url" :src="url" />
  </div>
  </div>
</div>
<div class="field">
  <label class="label">Server</label>
<div class="select">
  <select v-model="servers_id" @change="filter">
    <option v-for="server in servers" v-bind:value="server.id">{{server.name}}</option>
  </select>
</div>
</div>
<div class="field">
<label class="label">Categories</label>
<div class="select">
<select v-model="categories_id">
  <option v-for="category in categories" v-bind:value="category.id">{{category.name}}</option>
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
  <button @click="modal_open1()" class="button is-primary">Айтм нэмэх</button>
</div>
<div class="tabs is-centered">
  <ul>
    <li v-for="server in servers" :key="server.id"><a @click="c_change(server)">{{server.name}}</a></li>
  </ul>
</div>
<div class="tabs is-centered">
  <ul>
    <li v-for="category in categories" :key="category.id"><a @click="c_open(category)">{{category.name}}</a></li>
  </ul>
</div>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Sale</th>
        <th>Description</th>
        <th>Server</th>
        <th>Category</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Sale</th>
        <th>Description</th>
        <th>Server</th>
        <th>Category</th>
        <th>Actions</th>
      </tr>
    </tfoot>
    <tbody>
      <tr v-for="item in items" :key="item.id">
        <td>{{item.id}}</td>
        <td>{{item.name}}</td>
        <td>{{item.price}}</td>
        <td>{{item.sale}}</td>
        <td>{{item.desc}}</td>
        <td>{{item.serversname}}</td>
        <td>{{item.categoryname}}</td>
        <td>
          <button @click="modal_open2(item)"><unicon name="edit" fill="green" width="32px" height="32px"  /></button>
          <button @click="del(item)"><unicon name="trash" fill="red" width="32px" height="32px" /></button></td>
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
      price: '',
      sale: '',
      desc: '',
      image: '',
      modal_add: 'modal',
      modal_edi: 'modal',
      url: '',
      items: [],
      servers_id: '',
      categories_id: '',
      servers: [{id: 1}],
      categories: [],
      c_id: '',
      command: ''
    }
  },
  methods: {
    filter() {
    this.category_select(this.servers_id)
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
      this.image = e.target.files[0];
    },
    modal_open1() {
      this.modal_add = 'modal is-active'
    },
    modal_open2(item) {
      this.modal_edi = 'modal is-active'
      this.id = item.id
      this.name = item.name
      this.price = item.price
      this.sale = item.sale
      this.desc = item.desc
      this.image = item.image
      this.categories_id = item.categories_id
      this.servers_id = item.servers_id
      this.command = item.command
    },
    close() {
      this.modal_add = 'modal'
      this.modal_edi = 'modal'
      this.name = ''
      this.price = ''
      this.sale = ''
      this.desc = ''
      this.image = ''
      this.url = ''
      this.id = ''
      this.categories_id = ''
      this.server_id = ''
      this.command = ''
    },
    del(item) {
      let uri = 'api/admin/items/delete/' + item.id;
      let formData = new FormData()
       formData.append('id', item.id)
       if(confirm('are you sure?'))
       axios.post(uri, formData)
       .then(response => {
         this.close();
         this.serverfetch();
       })
    },
    create() {
      let uri = 'api/admin/items/create/';
      let formData = new FormData()
       formData.append('name', this.name)
       formData.append('price', this.price)
       formData.append('desc', this.desc)
       formData.append('sale', this.sale)
       formData.append('image', this.image)
       formData.append('categories_id', this.categories_id)
       formData.append('servers_id', this.servers_id)
       formData.append('command', this.command)
       axios.post(uri, formData)
   .then(response => {
     this.serverfetch(this.servers[0])
     this.categoryfetch(this.servers[0])

   })
    },
    edit() {
      let uri = 'api/admin/items/update/';
      let formData = new FormData()
      formData.append('id', this.id)
      formData.append('name', this.name)
      formData.append('price', this.price)
      formData.append('desc', this.desc)
      formData.append('sale', this.sale)
      formData.append('image', this.image)
      formData.append('categories_id', this.categories_id)
      formData.append('servers_id', this.servers_id)
      formData.append('command', this.command)
       axios.post(uri, formData)
   .then(response => {
     this.serverfetch(this.servers[0])
     this.categoryfetch(this.servers[0])
     
   })
 },
    serverfetch(item) {
      if(item.servers_id) {
        let uri = 'api/admin/items/?id=' + item.servers_id + '&c_id=' + this.c_id;
        this.axios.get(uri).then(response => {
          this.items = response.data.items;
        });
      }
      else {
        let uri = 'api/admin/items/?id=' + item.id + '&c_id=' + this.c_id;
        this.axios.get(uri).then(response => {
          this.items = response.data.items;
        });
      }
    },
    category_select(item) {
      let uri = 'api/admin/categories/' + item;
      this.axios.get(uri).then(response => {
        this.categories = response.data.categories;
      });
    },
    categoryfetch(item) {
      let uri = 'api/admin/categories/' + item.id;
      this.axios.get(uri).then(response => {
        this.categories = response.data.categories;
      });
    },
    c_change(category) {
      this.serverfetch(category)
      this.categoryfetch(category)

    },
    c_open(category) {
        this.c_id = category.id
        this.serverfetch(category)
        console.log(category)
    }
  },
  created() {
    let uri = 'api/admin/servers';
    this.axios.get(uri).then(response => {
      this.servers = response.data.servers;
      this.serverfetch(this.servers[0])
      this.categoryfetch(this.servers[0])
    });

  }
}
</script>
