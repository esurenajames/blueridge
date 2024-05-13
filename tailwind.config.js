/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  content: [
    "./node_modules/flowbite/**/*.js"
  ],
  plugins: [
    require('flowbite/plugin')
  ],
}

module.exports = {

  plugins: [
      require('flowbite/plugin')
  ]

}
