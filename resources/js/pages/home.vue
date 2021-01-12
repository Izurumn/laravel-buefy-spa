<template>
      <card :title="$t('home')">
        <h1 v-if="this.$userId='admin'">

          <button @click="aa">Are you freaking fucking admin? I smell admins</button>

        </h1>
      </card>
</template>

<script>

import Vue from 'vue'

import router from '~/router'
export default {
  middleware: 'auth',
    methods: {

        aa(){
          router.push({ path: "/admin/"});
        }
    },
}
</script>
