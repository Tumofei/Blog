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
    $.post('../Controllers/create_user.php', data, function (response) {
        var data = JSON.parse(response);
        if (data.result == true) {
            //email занят
            $('#results').empty();
            $('#results').append('Введённый email занят!');
            setTimeout('document.location.href="../Views/create_user_view.php";', 1500);
        } else {
            //свободен
            document.location.href = '../Views/posts_list.php?email=' + data.email;
        }
    });
}
