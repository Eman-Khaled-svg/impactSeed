// auth.js
const loginForm = document.getElementById("login-form");
const logoutBtn = document.getElementById("logout");

// تسجيل الدخول
if (loginForm) {
  loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    const { data, error } = await supabase.auth.signInWithPassword({
      email,
      password,
    });

    if (error) {
      alert("Error: " + error.message);
    } else {
      alert("Welcome back!");
      window.location.href = "index.html";
    }
  });
}

// تسجيل الخروج
if (logoutBtn) {
  logoutBtn.addEventListener("click", async () => {
    await supabase.auth.signOut();
    alert("Logged out");
    window.location.href = "login.html";
  });
}
