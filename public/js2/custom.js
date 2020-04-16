/* 

1. Add your custom JavaScript code below
2. Place the this code in your template:

  

*/

/*
---------
LOAD MORE
---------
*/

$('.posts_more .holder').slice(0, 3).show();

$('#btnMore').on('click', function () {
    $('.posts_more .holder:hidden').slice(0, 3).slideDown();
    if ($('.posts_more .holder:hidden').length === 0) {
        $('#btnMore').fadeOut();
    }
});