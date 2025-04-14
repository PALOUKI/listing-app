/** @type {import('tailwindcss').Config} */
export default {
  darkMode: "selector",
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  safelist:[
    'max-w-sm',
    'max-w-md',
    'max-w-lg',
    'max-w-xl'
  ],
  theme: {
    extend: {
      fontFamily : {
        Montserrat : ["Montserrat", "sans-serif"],
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

