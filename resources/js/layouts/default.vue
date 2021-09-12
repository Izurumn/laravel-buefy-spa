
<template>
  <div class="columns">
    <!-- Hero head: will stick at the top -->

      <navbar />

    <!-- Hero content: will be in the middle -->



      <child />
    </div>





</template>
<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'MainLayout',

  components: {
    Navbar
  }
}
</script>
