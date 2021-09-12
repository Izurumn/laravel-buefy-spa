<template>
  <div class="container-3">
    <div class="columns">
      <div class="column is-full-mobile is-full-tablet is-three-quarters-desktop is-three-quarters-widescreen is-three-quarters-fullhd">
        <div class="card">
          <header class="card-header is-green">
            <p class="card-header-title is-black">
              <b>Эцэг эхэд</b>
            </p>
          </header>
          <div class="card-content">
            <div class="content">
              We understand that the idea that your child wants to buy something on the internet a bit worrying so we will quickly explain it to you.<br>
              Your child is playing in an online world, with many other players, each player starts with a default rank, which comes with many features already, but not all of them. When purchasing a package to our server, we reward your child with a higher rank and/or other features. This includes more features than the default rank or enables them to be able to get extra things on the network, therefore making the game experience more enjoyable.
          </div>
          </div>
        </div>
        <div class="card">
          <header class="card-header is-red">
            <p class="card-header-title is-black">
              <b>Буцаан олголт</b>
            </p>
          </header>
          <div class="card-content">
            <div class="content">
              Since the items and ranks you receive when purchasing are Digital Intangible Items, there is a strict no refund policy.
              <br>
              Since you can not replace the time it took to assign you the rank, and/or give back the items you received no refunds will be granted.
              <br>
              Opening a PayPal dispute will result in your account being banned on our network and other webstores.
            </div>
          </div>
        </div>
        <div class="card">
          <header class="card-header is-yellow">
            <p class="card-header-title is-black">
              <b>Үйлчилгээний нөхцөл</b>
            </p>
          </header>
          <div class="card-content">
            <div class="content">
              All information that is required on this webstore is not shared with any other third parties and is stored securely. All payments are processed via SSL enabled gateways and ensure that your payment details are secure. Personal information is collected so that we can fulfill your order and it is never shared with any other third parties.
            </div>
          </div>
        </div>
      </div>
      <div class="column is-full-mobile is-full-tablet is-3-desktop is-3-widescreen is-3-fullhd">
        <sidebar />
      </div>
  </div>
</div>
</template>
<script>
import sidebar from './shop/sidebar'
export default {
  metaInfo () {
    return { title: 'Дэлгүүр' }
  },
components: {
  sidebar
}
}
</script>
