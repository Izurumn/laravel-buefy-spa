    <template>
      <div>
      <div class="sidebar-2 is-hidden-mobile">
      <div style="">
        <div class="overlay-position">
        <img src="/images/hover.png" style="width:100%;position:relative;">
        <div class="overlay-img">Nexus Gaming Community</div>
       </div>
        <aside class="menu" style="padding: 30px;">
          <p class="menu-label">Үндсэн</p>
             <ul class="menu-list">
               <li><router-link :to="{ name: 'welcome' }"><font-awesome-icon icon="home" /> Нүүр хуудас</router-link></li>
               <li><router-link :to="{ name: 'shop' }"><font-awesome-icon icon="store" /> Дэлгүүр</router-link></li>
             </ul>
             <p class="menu-label">Майнкрафт</p>
                <ul class="menu-list">
                  <li><a><font-awesome-icon icon="atlas" /> Вики</a></li>
                  <li><a><font-awesome-icon icon="ban" /> Бан жагсаалт</a></li>
                </ul>
              <p class="menu-label">Тусламж</p>
                 <ul class="menu-list">
                   <li><a><font-awesome-icon icon="address-book" /> Холбоо барих</a></li>
                   <li><a><font-awesome-icon icon="lightbulb" /> Санал хүсэлт</a></li>
                 </ul>
                 <hr>
                 <ul class="menu-list">
                   <li><a>Үйлчилгээний нөхцөл</a></li>
                 </ul>
      </aside>
  </div>
  <footer class="footer">
    <div class="content has-text-centered">
      <div id="social" class="mb-5 text-center">
                 <a class="fb-ic" href="https://www.facebook.com/mc.nexus.mn">
                 <svg class="svg-inline--fa fa-facebook-square fa-w-14 fa-lg white-text mr-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"></path></svg><!-- <i class="fab fa-facebook-square fa-lg white-text mr-4"> </i> -->
                 </a>
                 <a class="yt-ic" href="https://mc.nexus.mn/youtube">
                 <svg class="svg-inline--fa fa-youtube fa-w-18 fa-lg white-text mr-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg><!-- <i class="fab fa-youtube fa-lg white-text mr-4"> </i> -->
                 </a>
                 <a class="dis-ic" href="https://mc.nexus.mn/discord">
                 <svg class="svg-inline--fa fa-discord fa-w-14 fa-lg white-text mr-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="discord" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M297.216 243.2c0 15.616-11.52 28.416-26.112 28.416-14.336 0-26.112-12.8-26.112-28.416s11.52-28.416 26.112-28.416c14.592 0 26.112 12.8 26.112 28.416zm-119.552-28.416c-14.592 0-26.112 12.8-26.112 28.416s11.776 28.416 26.112 28.416c14.592 0 26.112-12.8 26.112-28.416.256-15.616-11.52-28.416-26.112-28.416zM448 52.736V512c-64.494-56.994-43.868-38.128-118.784-107.776l13.568 47.36H52.48C23.552 451.584 0 428.032 0 398.848V52.736C0 23.552 23.552 0 52.48 0h343.04C424.448 0 448 23.552 448 52.736zm-72.96 242.688c0-82.432-36.864-149.248-36.864-149.248-36.864-27.648-71.936-26.88-71.936-26.88l-3.584 4.096c43.52 13.312 63.744 32.512 63.744 32.512-60.811-33.329-132.244-33.335-191.232-7.424-9.472 4.352-15.104 7.424-15.104 7.424s21.248-20.224 67.328-33.536l-2.56-3.072s-35.072-.768-71.936 26.88c0 0-36.864 66.816-36.864 149.248 0 0 21.504 37.12 78.08 38.912 0 0 9.472-11.52 17.152-21.248-32.512-9.728-44.8-30.208-44.8-30.208 3.766 2.636 9.976 6.053 10.496 6.4 43.21 24.198 104.588 32.126 159.744 8.96 8.96-3.328 18.944-8.192 29.44-15.104 0 0-12.8 20.992-46.336 30.464 7.68 9.728 16.896 20.736 16.896 20.736 56.576-1.792 78.336-38.912 78.336-38.912z"></path></svg><!-- <i class="fab fa-discord fa-lg white-text mr-4"> </i> -->
                 </a>
               </div>
    </div>
  </footer>
</div>
<div class="container is-hidden-desktop">
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navb-item">
        Эхлэл
      </a>

      <a class="navb-item">
        Дэлгүүр
      </a>


    </div>


  </div>
</nav>
</div>
</div>
    </template>
<script>
import $ from 'jquery'
export default {
mounted: function(){
  $(document).ready(function() {

    // Check for click events on the navbar burger icon
    $(".navbar-burger").click(function() {

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");

    });
  });
}
}
</script>
