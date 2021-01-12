<template>
      <card :title="$t('home')">
        <h1 v-if="this.$userId='admin'">
          <button class="button is-primary is-medium"
              @click="show()">
              шинээр үүсгэх
          </button>
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
                    {{props.row.name}}
                  </b-table-column>
                  <b-table-column field="utas" label="Price">
                    {{props.row.skey}}
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
                    <b-modal :active.sync="isCardModalActive2" :width="640" scroll="keep">
              <div class="card">
                  <div class="card-content" style="background-color:black;">
                      <div class="media" style="display:inline-grid;">
                        <b-field class="black" label="Name">
                          <b-input
                                    type="text"
                                    name="name2"
                                    required
                                    v-model="name2">
                                  </b-input>
                        </b-field>
                        <b-field class="black" label="Server Key">
                          <b-input
                                    type="text"
                                    name="skey2"
                                    required

                                    v-model="skey2">
                                  </b-input>
                        </b-field>


                        <b-button class="is-black" size="is-medium" @click="create()">
                        Оруулах
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
                    <b-modal :active.sync="isCardModalActive" :width="640" scroll="keep">
              <div class="card">
                  <div class="card-content" style="background-color:black;">
                      <div class="media" style="display:inline-grid;">
                        <b-field class="black" label="Name">
                          <b-input
                                    type="text"
                                    name="name"
                                    required
                                    v-model="name">
                                  </b-input>
                        </b-field>
                        <b-field class="black" label="Server Key">
                          <b-input
                                    type="text"
                                    name="skey"
                                    required

                                    v-model="skey">
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
      isCardModalActive: false,
      isCardModalActive2: false,
      skey: '',
      name: '',
      skey2: '',
      name2: '',
      id: '',
    }


    },
    methods: {
      confirm(props) {
          this.$buefy.dialog.confirm({
              message: 'Continue on this task?',
              onConfirm: () => {
                axios.post('https://mc.animax.mn/api/admin/servers/delete/' + props.row.id)
                  .then(response => {
                     this.$router.go();
                  })
              }
          })
      },
      edit(props) {
        this.isCardModalActive = true,
        this.id = props.row.id,
        this.name = props.row.name,
        this.skey = props.row.skey


      },

      aa(){
        axios.put('https://mc.animax.mn/api/admin/servers/update/' + this.id, {
            name: this.name,
            skey: this.skey,


          })
          .then(response => {
             this.$router.go();
          })

      },
      show() {
                this.isCardModalActive2 = true
      },
      create(){

        axios.post('https://mc.animax.mn/api/admin/servers/create/', {
            name: this.name2,
            skey: this.skey2,


          })
          .then(response => {
             this.$router.go();
          })

      },
    },
    created() {
  //  let uri = '/anime/' + this.$route.params.slug + '/episode/' + this.$route.params.Dugaar;
    let uri = 'api/admin/servers/';
    this.axios.get(uri).then(response => {
      this.server = response.data.server;
    });

  },
  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
