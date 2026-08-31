document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const passwordInput = document.querySelector('input[name="password"]');

  form.addEventListener("submit", function (event) {
    if (passwordInput.value.length < 6) {
      alert("كلمة المرور يجب أن تكون 6 أحرف أو أرقام على الأقل!");
      event.preventDefault();
    }
  });
});
