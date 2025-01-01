/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["*/*.{html,js,php}",  "node_modules/flowbite/**/*.js"],
  darkMode: 'dark',
  
   theme: {
     extend: {},
},
   plugins: [
    require('flowbite/plugin')
   ],
}