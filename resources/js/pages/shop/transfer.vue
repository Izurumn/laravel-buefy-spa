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
<div class="">
  <div class="container-contact100" v-for="servers in server" :key="server.id">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
          <p class="help is-danger">{{ namez }}</p>
            <p class="help is-danger">{{ utasz }}</p>
              <p class="help is-danger">{{ emailz }}</p>
              <p class="help is-danger">{{ codez }}</p>
				</span>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Minecraft Username/Сервер лүү нэвтрэх нэр/</span>
					<input v-model="mc_username" class="input100" type="text" name="name" placeholder="Нэрээ оруулна уу...">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
					<span class="label-input100">И-Майл хаяг *</span>
					<input v-model="email" class="input100" type="text" name="email" placeholder="И-Майл хаягаа бичнэ үү">
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Холбогдох дугаар/Mobicom,Unitel,Skytel,G-Mobile/</span>
					<input v-model="utas" class="input100" type="text" name="number" placeholder="99xxxxxx">
				</div>
        <h2>  <span :data-text="message"></span></h2>
				<div class="wrap-input100 validate-input" data-validate="Message is required">
					<span class="label-input100">Дээрх кодыг дуурайлган бич</span>
					<input v-model="code" class="input100" name="text" placeholder="..."></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<b-button class="contact100-form-btn" @click="post(servers)">
							Төлбөр төлөх
						</b-button>
					</div>
				</div>
			</form>
		</div>

		<span class="contact100-more">
				Тусламж авах бол 99267318
		</span>
	</div>
</div>

      <!-- <div class="column is-half is-offset-one-quarter">

  <div class="content" v-for="servers in server" :key="server.id">
<div class="title is-light">{{servers.title}}</div>
<div class="buyitem">


<b-field class="white" label="Minecraft Username/Нэвтрэх нэр/">
  <b-input placeholder="starken г.м"
            type="mc_username"
            name="mc_username"
            required
            validation-message="Серверийн нэвтрэх нэрээ бич"
            v-model="mc_username">
          </b-input>
</b-field>
<b-field class="white" label="Гар утасны дугаар">
  <b-input placeholder="95xxxxxx"
            type="number"
            minlength="8"
            maxlength="8"
            required
            name="utas"
            validation-message="Дугаараа бич"
            v-model="utas">
          </b-input>
</b-field>
<b-field class="white" label="E-Майл хаяг">
  <b-input placeholder="xxxxx@gmail.com"
            type="email"
            required
            name="email"
            validation-message="И-майл бич"
            v-model="email">
          </b-input>
</b-field>

<b-field class="white" label="Дээрх кодыг дуурайлган бичнэ үү">
  <b-input placeholder=""
            type="text"
            minlength="10"
            maxlength="10"
            required
            name="code"
            validation-message="кодыг бичнэ үү"
            v-model="code">
          </b-input>
</b-field>
<b-button class="is-light" size="is-medium" @click="post(servers)">
Төлбөр төлөх
</b-button>

</div>
  </div>

</div> -->

</div>
</section>
</template>

<style>
[data-text] {
  color: orange;
}
[data-text]::after {
  content: attr(data-text);
}
</style>
<script>

window.axios = require('axios');
import Vue from 'vue'
import router from '~/router'
export default {

  data() {
    return {
      server: '',
      utas: '',
      email: '',
      mc_username: '',
      code: '',
      namez: '',
      utasz: '',
      emailz: '',
      codez: '',
      activeStep: 0,
      message: '',
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
      mobileMode: 'minimalist'
    }
  },
  created() {
//  let uri = '/anime/' + this.$route.params.slug + '/episode/' + this.$route.params.Dugaar;
  let uri = 'api/shop/item/' + this.$route.params.id;
  this.axios.get(uri).then(response => {
    this.server = response.data.server;
  });
  let message = this.rndStr(10)

  this.message = message
},
methods: {
  rndStr(len) {
    let text = ""
    let chars = "abcdefghijklmnopqrstuvwxyz1234567890"

    for( let i=0; i < len; i++ ) {
      text += chars.charAt(Math.floor(Math.random() * chars.length))
    }

    return text
  },
  post(servers,code) {
    this.namez = ''
    this.utasz = '';
    this.emailz = '';
    this.codez = '';
    if(!this.mc_username) {
      this.namez = 'Username оруулна уу';
    }
    if(this.utas < 79999999) {
      this.utasz = 'Дугаараа оруулна уу';
    }
    if(!this.email) {
      this.emailz = 'И-Майлаа оруулна уу';
    }
    if(!this.message == this.code) {
      this.codez = 'Кодоо зөв оруулна уу'
    }
     if(this.mc_username && this.utas && this.email && this.message == this.code) {
    axios
        .post('https://mc.animax.mn/api/order', {
          mc_username: this.mc_username,
          utas: this.utas,
          email: this.email,
          shopbyserver: this.$route.params.id
        })
        .then( response => {
                        router.push({ path: "/transaction/" + servers.price + "/u/" + this.mc_username});
                    }, error => {
                        console.log('erro');
                    });
                  }


  }
}

}
</script>
