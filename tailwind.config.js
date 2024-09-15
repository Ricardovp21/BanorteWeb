/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'redsito': '#EB0029',
        'redsitoHov': "#DB0026",
      },
      fontFamily: {
        'roboto': ['Roboto', 'sans-serif'],
        'gotham': ['Gotham-Medium', 'sans-serif'],
        'gothamBook': ['Gotham-Book', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
