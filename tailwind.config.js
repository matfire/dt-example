/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.{js,svelte,ts}",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}