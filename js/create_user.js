/**
 * Created by Timofei on 23.03.2016.
 */
$(document).ready(function(){
    $('#submit').click(function (e) {
        e.preventDefault();
        var name = $('#name').val();
        name = encodeURIComponent(name);
        var email = $('#email').val();
        email = encodeURIComponent(email);


        $('#results').load("../Controllers/create_user.php?name="+name+"&email="+ email );
    });
});