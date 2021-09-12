<template>
    <div class="container-3" style="padding:25px;">
      <div :class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Үйлчилгээний нөхцөл</p>
      <button class="delete" aria-label="close" @click="close()"></button>
    </header>
    <section class="modal-card-body is-white">
      Thank you for supporting! We hope you enjoy the perks and benefits of your purchase!
 <br>
Please ensure that you re-read the terms and conditions you agreed to before you made your purchase and that you have met the conditions.
 <br>
If you have any questions or issues, please e-mail: info@jartexnetwork.com
 <br>
Terms of Service
 <br>
Jartexnetwork would like to advise that all payments are made through the server store are final.
This means once you make a purchase you cannot claim your money back if you want it later down the line. We do not offer refunds to customers. Please take time and care when choosing to make a purchase. Before purchasing, you must understand and agree to the following terms of service agreement. The account holder of the payment gateway also be over the age of 18 or have consent from someone over the age of 18.
 <br>
1. You are over the age of 18 or have parental permission.<br>
2. You have the authorization to use the debit/credit card and/or PayPal account.<br>
3. You will not chargeback, dispute, reverse any payments.<br>
4. You will not abuse your gifts and/or ranks.<br>
5. We reserve the right to ban any account without notice for any reason.<br>
6. We always have permission to change or delete packages/(rank) perks.<br>
7. We are allowed to delete your packages/(rank) perks without any reason.<br>
8. Charge-back will result in a perm ipban/ban.<br>
9. Top voter vouchers only valid without a sale.<br>
 <br>
Refund Policy
 <br>
All sales are final, you may not buy-back, stop, credit the server by any means necessary in order to receive your funds back that of which have been paid. And in doing so we reserve the right to disallow your continued play on the server/forums and not allow further funds to be added or taken away. We reserve the right to pursue any legal or collection action necessary to recover damages in the event of a forced charge-back.
 <br>
All purchases are final. There are absolutely no refunds*
 <br>
*The cases that we give refunds are limited to: (Accidentally charging twice, not receiving the package or if we believe a refund is justifiable due to circumstances provided etc). We do not provide refunds to claims of unauthorized purchases. It is your responsibility to ensure that you are the purchase is made by the cardholder.
 <br>
Issuing a chargeback or claiming refunds is a violation of our terms of services and will result in the loss of your rank, and you will be permanently banned from Jartexnetwork.
 <br>
Rank powers are a privilege, not a right! We track all console commands, logs etc. If we find out that you are abusing your powers or impeding the in-game progress of other users against their will you will lose your advantage with no refunds.
 <br>
Privacy Policy
 <br>
This policy covers how we use your personal information. We take your privacy seriously and will take all measures to protect your personal information.
 <br>
Any personal information received will only be used to fill your order. We will not sell or redistribute your information to anyone.
 <br>
JartexNetwork is not affiliated with Minecraft, Mojang AB and/or Notch Development AB
 <br>
By making a purchase you agree to our refund policy and our payment terms.
<br>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click="close()">Зөвшөөрч байна</button>
    </footer>
  </div>
</div>
  <div class="columns">
    <div class="column is-full-mobile is-full-tablet is-three-quarters-desktop is-three-quarters-widescreen is-three-quarters-fullhd">


    <article class="message is-info">

<div class="message-body">
<b>{{item.servername }} · {{item.name}}</b> <b style="float: right;">{{item.price}}₮</b>
</div>
</article>
      <div class="column">
        <article class="message is-dark">
  <div class="message-header">
    <p>Кофун хямдрал</p>
  </div>
  <div class="message-body">
        <div class="field has-addons">
          <div class="control">
            <input class="input" type="text" placeholder="Код">
          </div>
          <div class="control">
            <a class="button is-info">
              Оруулах
            </a>
          </div>
        </div>
    </div>
</article>
<article v-show="errors" class="message">
  <div class="message-body" style="color:red;">
    Таны утасны дугаар эсвэл username буруу байна.
    <br>
        </div>
</article>
        <article class="message is-dark">
  <div class="message-header">
    <p>Төлбөрийн мэдээлэл</p>
  </div>
  <div class="message-body">
    <div class="field">
      <label class="label is-black">Minecraft username</label>
      <div class="control">
        <input class="input" v-model="username" type="text" placeholder="Minecraft username">
      </div>
    </div>
    <div class="field">
      <label class="label is-black">Холбоо барих утас</label>
      <div class="control">
        <input class="input" v-model="number" type="text" placeholder="99******">
      </div>
    </div>

    </div>
</article>
<article v-show="errors2" class="message">
  <div class="message-body" style="color:red;">
    Та үйлчилгээний нөхцлийг хүлээн зөвшөөрч байж гүйлгээг цааш үргэлжлүүлнэ...
    <br>
        </div>
</article>
<article class="message is-dark">
<div class="message-header">
<p>Гэрээ</p>
</div>
<div class="message-body">
  <label class="checkbox">
    <input type="checkbox" v-model="checked">
    Би энэ <a @click="open()">үйлчилгээний нөхцлийг</a> уншсан бөгөөд зөвшөөрч байна.
  </label>
</div>
</article>
<article class="message is-dark">
  <div class="message-header">
    <p>Нийт үнэ • {{item.price}}₮</p>
  </div>
</article>
<article class="message is-dark">
<div class="message-header">
<p>Гүйлгээ</p>
</div>
<div class="message-body">
    <button class="button is-success is-outlined is-large is-fullwidth" @click="create()">Дансаар гүйлгээ хийх</button>
</div>
</article>
  </div>
</div>
<div class="column is-full-mobile is-full-tablet is-3-desktop is-3-widescreen is-3-fullhd">
  <sidebar />
</div>
</div>
</div>
</template>

<script>
import axios from 'axios'
import sidebar from './sidebar'
export default {
  components: {
    sidebar
  },
  data() {
    return {
      item: [],
      price: '',
      username: '',
      number: '',
      price: '',
      order: [],
      hash: '',
      errors: false,
      ners: '',
      modal: 'modal',
      checked: false,
      errors2: false,
    }
  },
  created() {
    let uri = 'api/item/' + this.$route.params.id;
    this.axios.get(uri).then(response => {
      this.item = response.data.item;
      this.ners = this.item.servername + ' ' + this.item.name
    });
  },
  metaInfo () {
    return { title: this.ners }
  },
  methods: {
    open() {
      this.modal = 'modal is-active'
    },
    close() {
      this.modal = 'modal'
    },
    create() {

      if(this.number.length==8 && this.username.length>4) {
        if(this.checked==true) {
      this.gobit()
      }
      else {
        this.errors2 = true
      }
      }
      else {
        this.errors = true
      }
    },
    gobit() {
      let uri = 'api/order/';
      let formData = new FormData()
       formData.append('price', this.item.price)
       formData.append('username', this.username)
       formData.append('number', this.number)
       formData.append('items_id', this.item.id)
       axios.post(uri, formData)
       .then(response => {
         this.order = response.data
         this.$cookie.set('order', this.order, { expires: '60m' });
         this.$router.push('/buy/' + this.order);
        })
    }
  }
}
</script>
