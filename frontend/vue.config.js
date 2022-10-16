module.exports = {
  chainWebpack: config => {
    config
    .plugin('html')
    .tap(args => {
      args[0].title = 'Izpildīts testa uzdevums (Ēriks Ķirsis)'
      return args
    })
  },

  configureWebpack: {
    devServer: {
      watchOptions: {
        ignored: /node_modules/,
        poll: 1000,
      },
    },
  },

  pluginOptions: {
    i18n: {
      locale: 'lv',
      fallbackLocale: 'lv',
      localeDir: 'i18n',
      enableInSFC: false,
      enableLegacy: false,
    },
  },
};
