function popUpNew(url) {
    var day = new Date();
    var id = day.getTime();
    eval("page" + id + " = window.open(url, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=734,height=696');");
}
