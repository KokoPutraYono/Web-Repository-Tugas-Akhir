/** @type {import('tailwindcss').Config} */

const plugin = require('tailwindcss/plugin');
const flowbite = require('flowbite/plugin');
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [
    flowbite,
    plugin(function({ addBase, config }) {
      addBase({
        '@dark': config('dark-mode-class'),
      });
    }),
    require('tailwindcss-dark-mode')()
  ],
  // plugins: [
  //   require('flowbite/plugin'),
  //   require('tailwindcss-dark-mode')()
  // ],
}
