Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'handleTranslations',
      path: '/handleTranslations',
      component: require('./components/Tool'),
    },
  ])
})
