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
  { path: '/shop', name: 'shop', component: page('shop.vue') },
  { path: '/category/:id', name: 'server', component: page('shop/server.vue') },
  { path: '/transfer/:id', name: 'transfer', component: page('shop/transfer.vue') },
  { path: '/buy/:id', name: 'bank', component: page('shop/bank.vue') },
  { path: 'home', name: 'home', component: page('home.vue') },
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
        { path: '', name: 'admin.orders', component: page('admin/home.vue') },
        { path: 'items', name: 'admin.items', component: page('admin/items.vue') },
        { path: 'categories', name: 'admin.categories', component: page('admin/categories.vue') },
        { path: 'servers', name: 'admin.servers', component: page('admin/servers.vue') },
        { path: 'posts', name: 'admin.posts', component: page('admin/posts.vue') }
      ] },



  { path: '*', component: page('errors/404.vue') }
]
