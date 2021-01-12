
<template>
  <div>
  <section class="hero" style="background-color:#16161d;">
    <!-- Hero head: will stick at the top -->

      <navbar />

    <!-- Hero content: will be in the middle -->


      <child />



  </section>

</div>
</template>
<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'BasicLayout',

  components: {
    Navbar
  }
}
</script>
