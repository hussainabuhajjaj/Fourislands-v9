/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        navy: {
          50:  '#f0f1f5',
          100: '#e0e2ea',
          200: '#c2c5d5',
          300: '#a3a8c1',
          400: '#858bac',
          500: '#666e98',
          600: '#4a5175',
          700: '#2d3552',
          800: '#1e253e',
          900: '#0F172A',
          950: '#020617',
        },
        gold: {
          50:  '#faf6ee',
          100: '#f5edd6',
          200: '#ebdbb0',
          300: '#e0c986',
          400: '#d4b978',
          500: '#C5A35A',
          600: '#a8883e',
          700: '#8a6d32',
          800: '#6c5528',
          900: '#4e3d1d',
        },
        brand: {
          blue: '#2563EB',
          'blue-hover': '#1D4ED8',
          'blue-light': '#DBEAFE',
        },
      },
      fontFamily: {
        heading: ['Plus Jakarta Sans', 'sans-serif'],
        body: ['Plus Jakarta Sans', 'sans-serif'],
      },
      maxWidth: {
        '8xl': '1400px',
      },
      animation: {
        'fade-in': 'fadeIn .6s ease forwards',
        'slide-up': 'slideUp .6s ease forwards',
        'float': 'float 8s ease-in-out infinite alternate',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideUp: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        float: {
          '0%': { transform: 'translate(0, 0) scale(1)' },
          '100%': { transform: 'translate(30px, -20px) scale(1.05)' },
        },
      },
    },
  },
  plugins: [],
};
