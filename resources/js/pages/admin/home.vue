<template>
<div>
  <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Rank</th>
      <th>Number</th>
      <th>Server name</th>
      <th>Command</th>
      <th>Status</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Rank</th>
      <th>Number</th>
      <th>Server name</th>
      <th>Command</th>
      <th>Status</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </tfoot>
  <tbody>
    <tr v-for="order in orders" :key="order.id">
      <td>{{order.id}}</td>
      <td>{{order.username}}</td>
      <td>{{order.name}}</td>
      <td>{{order.number}}</td>
      <td>{{order.servername}}</td>
      <td>{{order.command}}</td>
      <td>{{order.status}}</td>
      <td>{{order.created_at}}</td>
      <td><div class="button is-small" @click="changestatus(order)">Change status</div></td>
    </tr>
  </tbody>
</table>
</div>
</template>

<script>
window.axios = require('axios');
import Vue from 'vue'

export default {
  middleware: 'auth',
  data() {
    return {
      orders: []
    }
  },
  methods: {
    changestatus(order) {

    let uri = 'api/status/' + order.id;
      if(confirm('are you sure?'))
    this.axios.get(uri).then(response => {
      console.log(response.data);
    });
    }
  },
  created() {
    let uri = 'api/orders';
    this.axios.get(uri).then(response => {
      this.orders = response.data.orders;
    });

  }
}
</script>
