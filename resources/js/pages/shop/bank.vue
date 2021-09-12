<template>
  <div>
  <div v-if="this.$route.params.id==cookie" class="container-3">
    <div class="notification is-success">
      Таны захиалга амжилттай бүртгэгдлээ.
    </div>
    <div class="columns">
      <div class="column">
        <div class="card">
          <div class="card-content">
            <div class="content">
              <div class="card">
              <div class="card-content">
                <div class="content">
                  <img style="max-width:200px" src="/images/qpay.png">
                  <br>
                  <b>Банк:</b> Хаан банк
                  <br>
                  <b>Шилжүүлэх данс:</b> 5300482747
                  <br>
                  <b>Дансны нэр:</b> Б******* Энхбат
                  <br>
                  <b>Гүйлгээний дүн:</b> {{this.order.price}}
                  <br>
                  <b>Гүйлгээний утга:</b> {{this.order.username}}
                  <br>
                  Дээрх данс руу гүйлгээгээ хийнэ үү... <br>Автомат систем ажиллаж байна.
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="card">
  <div class="card-content">
    <div class="content">
      <img style="max-width:400px" src="/images/pico.png">
      <h2 style="color:white;">Анхааруулга(Заавал унш!)</h2>
      <font style="color:red">• Айтм өгөхөд заавал серверт байх хэрэгтэй.</font>
      <br>
      <font style="color:red">• Энэхүү захиалга хуурамч тохиолдолд таны акк бан авна</font>
      <br>
      • Гүйлгээний дүн зөрүүтэй тохиолдолд ранк, айтм орохгүй
      <br>
      • Гүйлгээ амжилттай болбол таны захиалсан ранк, айтм 10 минутанд орно.
      <br>
      • Цагийн дотор гүйлгээ хийгээгүй тохиолдолд ахин шинээр захиална.
      <br>
      • Хэрэв 10 минутанд ороогүй тохиолдолд та ажлын цагаар Discord/Odnoo админтай холбогдоно уу...
      <br>
      • Санал хүсэлтээ илгээх бол <a style="color:grey;" href="https://app.feedbacky.net/b/nexus">энд дар</a>
        </div>
  </div>
</div>
      </div>
    </div>
  </div>
<div v-else>
  cookie not found
</div>
</div>
</template>

<script>
export default {
  metaInfo () {
    return { title: 'Гүйлгээ хийх' }
  },

  data() {
    return {
      cookie: '',
      route: '',
      order: []
    }
  },
  created() {
    this.route = this.$route.params.id
    this.cookie = this.$cookie.get('order')
    let uri = 'api/order/' + this.$route.params.id;
    this.axios.get(uri).then(response => {
      this.order = response.data.order;
    });
  }
}
</script>
