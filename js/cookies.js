function controlcookies() {
    var d = new Date();
    var days = 7;
    d.setTime(d.getTime()+(days*24*60*60*1000));
    event.preventDefault();
    document.cookie = "cookie=true" + "; expires=" + d.toGMTString() + "; path=/";
    cookiebox.style.display='none';
}
