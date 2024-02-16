/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,php,js}"],
  theme: {
    extend: {
      fontFamily: {
        custom: ['inter', 'sans-serif'],
    },
  },
  plugins: [],
}
}