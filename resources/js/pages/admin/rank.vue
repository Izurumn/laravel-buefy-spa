<template>
      <card :title="$t('home')">
        <h1>
          <button class="button is-primary is-medium"
              @click="show()">
              шинээр үүсгэх
          </button>
          <b-modal :active.sync="isCardModalActive2" :width="640" scroll="keep">
    <div class="card">
        <div class="card-content" style="background-color:black;">
            <div class="media" style="display:inline-grid;">
              <b-field class="black" label="Title">
                <b-input
                          type="text"
                          name="title"
                          required
                          v-model="title2">
                        </b-input>
              </b-field>
              <b-field class="black" label="Description">
                <b-input
                          type="textarea"
                          name="description2"
                          required

                          v-model="description2">
                        </b-input>
              </b-field>

              <b-field class="black" label="Price">
                <b-input
                          type="text"

                          required
                          name="price2"

                          v-model="price2">
                        </b-input>
              </b-field>
              <b-field class="black" label="Command">
                <b-input
                          type="text"
                          required
                          name="command2"

                          v-model="command2">
                        </b-input>
              </b-field>
              <b-field class="black" label="Server ID">
                <b-input
                          type="text"
                          required
                          name="servers_id2"

                          v-model="servers_id2">
                        </b-input>
              </b-field>
              <b-button class="is-black" size="is-medium" @click="create()">
              Үүсгэх
              </b-button>
            </div>

            <div class="content">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                <a>#css</a> <a>#responsive</a>
                <br>
                <small>11:09 PM - 1 Jan 2016</small>
            </div>
        </div>
    </div>
</b-modal>
          <b-table
              :data="server"
              :bordered="isBordered"
              :striped="isStriped"
              :narrowed="isNarrowed"
              :hoverable="isHoverable"
              :loading="isLoading"
              :focusable="isFocusable"
              :mobile-cards="hasMobileCards"
              >

              <template slot-scope="props">
                <b-table-column field="id" label="ID" width="40" numeric key="server.id">
                    {{props.row.id}}
                  </b-table-column>
                  <b-table-column field="mc_username" label="Title">
                    {{props.row.title}}
                  </b-table-column>
                  <b-table-column field="utas" label="Price">
                    {{props.row.price}}
                  </b-table-column>
                  <b-table-column field="email" label="Command">
                    {{props.row.command}}
                  </b-table-column>
                  <b-table-column field="created_at" label="Server name">
                     {{props.row.name}}
                  </b-table-column>
                  <b-table-column field="actions" label="actions">
                    <button class="button is-primary is-medium"
                        @click="edit(props)">
                        засах
                    </button>
                    <button class="button is-danger is-medium"
                        @click="confirm(props)">
                        устгах
                    </button>

                    <b-modal :active.sync="isCardModalActive" :width="640" scroll="keep">
              <div class="card">
                  <div class="card-content" style="background-color:black;">
                      <div class="media" style="display:inline-grid;">
                        <b-field class="black" label="Title">
                          <b-input
                                    type="text"
                                    name="title"
                                    required
                                    v-model="title">
                                  </b-input>
                        </b-field>
                        <b-field class="black" label="Description">
                          <b-input
                                    type="textarea"
                                    name="description"
                                    required

                                    v-model="description">
                                  </b-input>
                        </b-field>

                        <b-field class="black" label="Price">
                          <b-input
                                    type="text"
                                    required
                                    name="price"

                                    v-model="price">
                                  </b-input>
                        </b-field>
                        <b-field class="black" label="Command">
                          <b-input
                                    type="text"
                                    required
                                    name="command"

                                    v-model="command">
                                  </b-input>
                        </b-field>
                        <b-field class="black" label="Server ID">
                          <b-input
                                    type="text"
                                    required
                                    name="servers_id"

                                    v-model="servers_id">
                                  </b-input>
                        </b-field>
                        <b-button class="is-black" size="is-medium" @click="aa()">
                        Засах
                        </b-button>
                      </div>

                      <div class="content">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                          Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                          <a>#css</a> <a>#responsive</a>
                          <br>
                          <small>11:09 PM - 1 Jan 2016</small>
                      </div>
                  </div>
              </div>
          </b-modal>
                  </b-table-column>

              </template>

              <template slot="empty">
                  <section class="section">
                      <div class="content has-text-grey has-text-centered">
                          <p>
                              <b-icon
                                  icon="emoticon-sad"
                                  size="is-large">
                              </b-icon>
                          </p>
                          <p>Nothing here.</p>
                      </div>
                  </section>
              </template>
          </b-table>
        </h1>
      </card>
</template>

<script>
window.axios = require('axios');
import Vue from 'vue'
import router from '~/router'
export default {
  middleware: 'auth',
  data() {
    return {
      isComponentModalActive: false,
      server: [],
      isEmpty: false,
      isBordered: true,
      isStriped: false,
      isNarrowed: false,
      isHoverable: true,
      isFocusable: false,
      isLoading: false,
      hasMobileCards: true,
      expandOnHover: false,
      mobile: "reduce",
      reduce: false,
      title: '',
      isCardModalActive: false,
      isCardModalActive2: false,
      shopbyserver_id: '',
      title: '',
      price: '',
      command: '',
      servers_id: '',
      description: '',
      id: '',
      shopbyserver_id2: '',
      title2: '',
      price2: '',
      command2: '',
      servers_id2: '',
      description2: '',
    }


    },
    methods: {
      confirm(props) {
          this.$buefy.dialog.confirm({
              message: 'Continue on this task?',
              onConfirm: () => {
                axios.post('https://mc.animax.mn/api/admin/ranks/delete/' + props.row.id)
                  .then(response => {
                     this.$router.go();
                  })
              }
          })
      },
      show() {
        this.isCardModalActive2 = true
      },
      edit(props) {
        this.isCardModalActive = true,
        this.id = props.row.id,
        this.title = props.row.title,
        this.price = props.row.price,
        this.command = props.row.command,
        this.servers_id = props.row.servers_id,
        this.description = props.row.description

      },

      create() {
        axios.post('https://mc.animax.mn/api/admin/ranks/create/', {
          title: this.title2,
          price: this.price2,
          command: this.command2,
          servers_id: this.servers_id2,
          description: this.description2,


          })
          .then(response => {
             this.$router.go();
          })
      },
      aa(){
        axios.put('https://mc.animax.mn/api/rank/' + this.id, {
            title: this.title,
            price: this.price,
            command: this.command,
            servers_id: this.servers_id,
            description: this.description,

          })
          .then(response => {
             this.$router.go();
          })
          .catch(error => {
            console.log(err);
          });
      },

    },
    created() {
  //  let uri = '/anime/' + this.$route.params.slug + '/episode/' + this.$route.params.Dugaar;
    let uri = 'api/ranks';
    this.axios.get(uri).then(response => {
      this.server = response.data.server;
    });

  },
  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
