import { defineConfig } from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  title: "SenseBank SDK PHP",
  description: "PHP SDK kit for sensebank installment",
  themeConfig: {
    // https://vitepress.dev/reference/default-theme-config
    nav: [
      { text: 'Home', link: '/' },
      { text: 'Quick start', link: '/quick-start' }
    ],

    sidebar: [
      {
        text: 'Quick start',
        items: [
          { text: 'Introducing', link: '/intro' },
          { text: 'Quick start', link: '/quick-start' }
        ]
      },
      {
        text: 'Documentation',
        items: [
          { text: 'Order', link: '/pages/order' },
          { text: 'Guarantee', link: '/pages/guarantee' },
          { text: 'Statement', link: '/pages/statement' }
        ]
      },
      {
        text: 'Declared Enums',
        items: [
          { text: 'Order limits', link: '/enums/order-limits' }
        ]
      },
      {
        text: 'Helpers',
        items: [
          { text: 'Money', link: '/helpers/money' }
        ]
      }
    ],

    socialLinks: [
      { icon: 'github', link: 'https://github.com/yuriizee/sensebank-installment-sdk' }
    ]
  }
})
