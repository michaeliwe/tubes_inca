$(document).ready(function () {
    let url = window.location;
    let sideMenu = $('.sidebar-menu li a[href="' + url + '"]');
    let childMenu = $('.treeview-menu li a');
    sideMenu.parent().addClass('active');
    sideMenu.addClass('active');
    let menu = childMenu.filter(function () {
        return this.href == url;
    });
    menu.addClass('active');
    menu.parent().parent().parent().addClass('active');
    menu.parent().parent().parent().parent().parent().addClass('active');
});
