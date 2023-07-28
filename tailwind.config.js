/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.php",
            "./item/detail.php",
            "./client/account.php",
            "./client/login.php",
            "./client/register.php"],
  theme: {
    extend: {
      colors: {
        bg1 : '#4FC0D0',
        bg2 : '#1B6B93',
        button1 : "#164B60",
        button2 : "#F5AF19",
        buttonHover1 : "#A2FF86",
      }
    },
  },
  plugins: [],
}