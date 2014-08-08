function controlcookies() {
    localStorage.controlcookie = (localStorage.controlcookie || 0);
    localStorage.controlcookie++;
    cookiebox.style.display='none';
}
