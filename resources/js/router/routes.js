function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'welcome', component: page('welcome.vue') },

  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },
    { path: '/shop', name: 'shop', component: page('Shop.vue') },
  { path: '/home', name: 'home', component: page('home.vue') },
    { path: '/server/:id', name: 'server', component: page('shop/server.vue') },
    { path: '/transaction/:price/u/:mc_username', name: 'transaction', component: page('shop/bank.vue') },
    { path: '/shop/item/:id', name: 'shopitem', component: page('shop/transfer.vue') },
  { path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ] },
    { path: '/admin/',
      component: page('admin/index.vue'),
      children: [
        { path: '', name: 'admin.home', component: page('admin/home.vue') },
        { path: 'completes', name: 'admin.completes', component: page('admin/completes.vue') },
        { path: 'ranks', name: 'admin.ranks', component: page('admin/rank.vue') },
        { path: 'servers', name: 'admin.servers', component: page('admin/servers.vue') },
        { path: 'posts', name: 'admin.posts', component: page('admin/posts.vue') }
      ] },

  { path: '*', component: page('errors/404.vue') }
]
