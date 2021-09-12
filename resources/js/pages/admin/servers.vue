<template>
  <div>
    <div :class="modal_add">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add server</p>
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
        <label class="label">Key</label>
        <div class="control">
          <input class="input" v-model="key" type="text" placeholder="32 урт key">
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
  <p class="modal-card-title">Edit server</p>
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
    <label class="label">Key</label>
    <div class="control">
      <input class="input" v-model="key" type="text" placeholder="32 урт key">
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
</section>
<footer class="modal-card-foot">
  <button @click="edit()" class="button is-success">Update</button>
  <button @click="close()" class="button">Cancel</button>
</footer>
</div>
</div>
    <div class="buttons">
  <button @click="modal_open1()" class="button is-primary">Сервер нэмэх</button>
</div>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Key</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Key</th>
        <th>Actions</th>
      </tr>
    </tfoot>
    <tbody>
      <tr v-for="server in servers" :key="server.id">
        <td>{{server.id}}</td>
        <td>{{server.name}}</td>
        <td>{{server.key}}</td>
        <td>
          <button @click="modal_open2(server)"><unicon name="edit" fill="green" width="32px" height="32px"  /></button>
          <button @click="del(server)"><unicon name="trash" fill="red" width="32px" height="32px" /></button></td>
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
      server: '',
      key: '',
      image: '',
      modal_add: 'modal',
      modal_edi: 'modal',
      url: '',
      servers: []
    }
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
      this.image = e.target.files[0];
    },
    modal_open1() {
      this.modal_add = 'modal is-active'
    },
    modal_open2(server) {
      this.modal_edi = 'modal is-active'
      this.name = server.name
      this.key = server.key
      this.id = server.id
    },
    close() {
      this.modal_add = 'modal'
      this.modal_edi = 'modal'
      this.name = ''
      this.server = ''
      this.key = ''
      this.image = ''
      this.url = ''
      this.id = ''
    },
    del(server) {
      let uri = 'api/admin/servers/delete/' + server.id;
      let formData = new FormData()
       formData.append('id', server.id)
       if(confirm('are you sure?'))
       axios.post(uri, formData)
       .then(response => {
         this.close();
         this.serverfetch();
       })
    },
    create() {
      let uri = 'api/admin/servers/create/';
      let formData = new FormData()
       formData.append('name', this.name)
       formData.append('key', this.key)
       formData.append('image', this.image)
       axios.post(uri, formData)
   .then(response => {
     this.serverfetch()
     this.close()
   })
    },
    edit() {
      let uri = 'api/admin/servers/update/';
      let formData = new FormData()
      formData.append('id', this.id)
       formData.append('name', this.name)
       formData.append('key', this.key)
       formData.append('image', this.image)
       axios.post(uri, formData)
   .then(response => {
     this.serverfetch()
     this.close()
   })
 },
    serverfetch() {
      let uri = 'api/admin/servers';
      this.axios.get(uri).then(response => {
        this.servers = response.data.servers;
      });
    }
  },
  created() {
    this.serverfetch()
  }
}
</script>
