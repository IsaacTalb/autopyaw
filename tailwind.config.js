/**
 * Tailwind CSS Configuration
 * Added custom `xs` breakpoint for extra‑small devices (e.g., iPhone SE).
 */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './app/**/*.php',
  ],
  theme: {
    extend: {},
    screens: {
      xs: '375px', // extra‑small screens (mobile phones)
      ...defaultTheme.screens,
    },
  },
  plugins: [],
};