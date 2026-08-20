/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        display: ['Sora', 'system-ui', 'sans-serif'],
        body: ['Manrope', 'system-ui', 'sans-serif'],
      },
      colors: {
        sika: {
          50: '#eefbf4',
          100: '#d7f4e4',
          200: '#b1e8ce',
          300: '#7fd6b0',
          400: '#47bd8b',
          500: '#1fa16f',
          600: '#128459',
          700: '#106949',
          800: '#0f543c',
          900: '#0d4532',
          950: '#06261c',
        },
        night: {
          700: '#14203c',
          800: '#0e1630',
          900: '#090f22',
          950: '#050913',
        },
        gold: {
          300: '#ffd98a',
          400: '#f5c460',
          500: '#e8a93b',
          600: '#cc8820',
        },
      },
      boxShadow: {
        soft: '0 10px 30px -12px rgba(9, 15, 34, 0.14)',
        card: '0 2px 6px -1px rgba(9, 15, 34, 0.06), 0 20px 40px -20px rgba(9, 15, 34, 0.16)',
        lift: '0 24px 48px -16px rgba(9, 15, 34, 0.22)',
        glow: '0 0 40px -10px rgba(31, 161, 111, 0.45)',
        'glow-soft': '0 0 24px -6px rgba(31, 161, 111, 0.35)',
      },
      borderRadius: {
        '4xl': '2rem',
      },
      backgroundImage: {
        'radial-sika': 'radial-gradient(1200px 600px at 50% -10%, rgba(31,161,111,0.12), transparent 60%)',
        'grid-fade':
          'linear-gradient(to right, rgba(31,161,111,0.08) 1px, transparent 1px), linear-gradient(to bottom, rgba(31,161,111,0.08) 1px, transparent 1px)',
      },
      keyframes: {
        fadeUp: {
          '0%': { opacity: '0', transform: 'translateY(24px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        fadeDown: {
          '0%': { opacity: '0', transform: 'translateY(-12px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-14px)' },
        },
        pulseSoft: {
          '0%, 100%': { opacity: '1' },
          '50%': { opacity: '0.65' },
        },
        shimmer: {
          '0%': { transform: 'translateX(-150%)' },
          '100%': { transform: 'translateX(250%)' },
        },
        blob: {
          '0%, 100%': { transform: 'translate(0, 0) scale(1)' },
          '33%': { transform: 'translate(24px, -32px) scale(1.08)' },
          '66%': { transform: 'translate(-20px, 20px) scale(0.94)' },
        },
        marquee: {
          '0%': { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-50%)' },
        },
        gradientShift: {
          '0%, 100%': { backgroundPosition: '0% 50%' },
          '50%': { backgroundPosition: '100% 50%' },
        },
        spinSlow: {
          '0%': { transform: 'rotate(0deg)' },
          '100%': { transform: 'rotate(360deg)' },
        },
        shine: {
          '0%': { transform: 'scaleX(0)', opacity: '0.6' },
          '60%': { transform: 'scaleX(1)', opacity: '0' },
          '100%': { transform: 'scaleX(1)', opacity: '0' },
        },
        ticker: {
          '0%': { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-100%)' },
        },
      },
      animation: {
        'fade-up': 'fadeUp 0.7s ease-out forwards',
        'fade-in': 'fadeIn 0.6s ease-out forwards',
        'fade-down': 'fadeDown 0.4s ease-out forwards',
        'float': 'float 6s ease-in-out infinite',
        'pulse-soft': 'pulseSoft 3s ease-in-out infinite',
        'shimmer': 'shimmer 2.5s infinite',
        'blob': 'blob 14s ease-in-out infinite',
        'marquee': 'marquee 32s linear infinite',
        'gradient-shift': 'gradientShift 6s ease infinite',
        'spin-slow': 'spinSlow 18s linear infinite',
        'shine': 'shine 2.6s ease-in-out infinite',
        'ticker': 'ticker 26s linear infinite',
      },
    },
  },
  plugins: [],
};
