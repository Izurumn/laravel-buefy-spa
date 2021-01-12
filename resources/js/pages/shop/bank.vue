<template>
  <section class="section">
    <center>        <b-steps
            v-model="activeStep"
            :animated="isAnimated"
            :rounded="isRounded"
            :has-navigation="hasNavigation"
            :icon-prev="prevIcon"
            :icon-next="nextIcon"
            :label-position="labelPosition"
            :mobile-mode="mobileMode"
            type="is-info">
        <b-step-item label="Холбоо барих мэдээлэл" icon="account-key"></b-step-item>
        <b-step-item label="Төлбөр төлөх" icon="account"></b-step-item>

    </b-steps>
  </center>
    <div class="columns is-centered">
      <div class="column">
        <h2 class="title">Доорх банкуудаар төлбөр хийх боломжтой.</h2>
        <b-table :data="data" :columns="columns"></b-table>
      </div>
    </div>
    <div class="is-danger">
      <b-notification
           type="is-danger"
           >
           Бид ойролцоогоор таны ранкийг хоёр цагийн дотор баталгаажуулж хийх болно. Баярлалаа.
           Бидэнтэй холбоо барих дугаар: 99267318
       </b-notification>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      activeStep: 1,

      showSocial: false,
      isAnimated: true,
      isRounded: true,
      isStepsClickable: false,

      hasNavigation: false,
      customNavigation: false,
      isProfileSuccess: false,

      prevIcon: 'chevron-left',
      nextIcon: 'chevron-right',
      labelPosition: 'bottom',
      mobileMode: 'minimalist',
      server: [],
      data: [
                   { 'bn': 'Khan bank', 'ai': '5023278124 MNT/₮', 'an': 'Баттөмөр Энхбат', 'price': this.$route.params.price + " ₮", 'utga': this.$route.params.mc_username },
                   { 'bn': 'Candy', 'an': '99267318', 'price': this.$route.params.price + "CANDY", 'utga': this.$route.params.mc_username },
               ],
               columns: [
                   {
                       field: 'bn',
                       label: 'Банк нэр',
                   },
                   {
                       field: 'ai',
                       label: 'Дансны дугаар',
                   },
                   {
                       field: 'an',
                       label: 'Дансны нэр',
                   },
                   {
                       field: 'price',
                       label: 'Гүйлгээний дүн',
                   },
                   {
                     field: 'utga',
                     label: 'Гүйлгээний утга',
                   }

               ]

    }
  },
  created() {
//  let uri = '/anime/' + this.$route.params.slug + '/episode/' + this.$route.params.Dugaar;
  let uri = 'api/shop/item/' + this.$route.params.id;
  this.axios.get(uri).then(response => {
    this.server = response.data.server;
  });

},
}
</script>
