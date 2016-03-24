/**
 * Created by Timofei on 23.03.2016.
 */
jQuery(function ($) {
    $('#form').submit(function (e) {
        e.preventDefault();
        call();
    });
});


function call() {
    var data = $('#form').serialize();
    $.post('../Controllers/login.php', data, function (response) {
        var data = JSON.parse(response);
        if (data.result == 'ok') {

            $('#results').empty();
            $('#results').append('Вcё верно!');
            //setTimeout('document.location.href="../Views/user_posts.php?email="+ data.email;', 1000);
            document.location.href = '../Views/user_posts.php?email=' + data.email;
        } else {
            $('#results').empty();
            $('#results').append('Вы ввели неправильный email/password!');
            setTimeout('document.location.href="../Views/login.html";', 1500);
        }
    });
}