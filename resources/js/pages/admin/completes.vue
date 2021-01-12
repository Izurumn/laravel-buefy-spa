<template>
      <card :title="$t('home')">
        <h1 v-if="this.$userId='admin'">
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
                  <b-table-column field="mc_username" label="Minecraft Username">
                    {{props.row.mc_username}}
                  </b-table-column>
                  <b-table-column field="utas" label="Холбогдох утас">
                    {{props.row.utas}}
                  </b-table-column>
                  <b-table-column field="email" label="E-mail хаяг">
                    {{props.row.email}}
                  </b-table-column>
                  <b-table-column field="created_at" label="Огноо">
                     {{props.row.created_at}}
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

export default {
  middleware: 'auth',
  data() {
    return {
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
      reduce: false
    }


    },
    created() {
  //  let uri = '/anime/' + this.$route.params.slug + '/episode/' + this.$route.params.Dugaar;
    let uri = 'api/completes';
    this.axios.get(uri).then(response => {
      this.server = response.data.server;
    });

  },
  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
