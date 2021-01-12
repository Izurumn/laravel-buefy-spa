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
                    {{props.row.title}}
                  </b-table-column>
                  <b-table-column field="utas" label="Price">
                    {{props.row.body}}
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
                        <b-field class="black" label="Title">
                          <b-input
                                    type="text"
                                    name="title"
                                    required
                                    v-model="title2">
                                  </b-input>
                        </b-field>
                        <b-field class="black" label="Body">
                          <b-input
                                    type="textarea"
                                    name="body"
                                    required

                                    v-model="body2">
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
                        <b-field class="black" label="Title">
                          <b-input
                                    type="text"
                                    name="title"
                                    required
                                    v-model="title">
                                  </b-input>
                        </b-field>
                        <div style="width:400px">
                      <ckeditor :editor="editor" v-model="body" :config="editorConfig"></ckeditor>
                      </div>
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
window.ClassicEditor = require('@ckeditor/ckeditor5-build-classic');
export default {
  middleware: 'auth',
  data() {
    return {
      editor: ClassicEditor,

        editorConfig: {
            // The configuration of the editor.
        },
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
      title: '',
      body: '',
      title2: '',
      body2: '',
      id: '',
    }


    },
    methods: {
      confirm(props) {
          this.$buefy.dialog.confirm({
              message: 'Continue on this task?',
              onConfirm: () => {
                axios.post('https://mc.animax.mn/api/admin/posts/delete/' + props.row.id)
                  .then(response => {
                     this.$router.go();
                  })
              }
          })
      },
      edit(props) {
        this.isCardModalActive = true,
        this.id = props.row.id,
        this.title = props.row.title,
        this.body = props.row.body


      },

      aa(){
        axios.put('https://mc.animax.mn/api/admin/posts/update/' + this.id, {
            title: this.title,
            body: this.body,


          })
          .then(response => {
             this.$router.go();
          })

      },
      show() {
                this.isCardModalActive2 = true
      },
      create(){

        axios.post('https://mc.animax.mn/api/admin/posts/create/', {
            title: this.title2,
            body: this.body2,


          })
          .then(response => {
             this.$router.go();
          })

      },
    },
    created() {
  //  let uri = '/anime/' + this.$route.params.slug + '/episode/' + this.$route.params.Dugaar;
    let uri = 'api/posts/';
    this.axios.get(uri).then(response => {
      this.server = response.data.posts;
    });

  },
  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
