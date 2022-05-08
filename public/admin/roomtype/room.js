







$(document).ready(function () {
    var Right = $('#right');
    var Left = $('#left');
    console.log(right);
    console.log(left);

    function checkClients() {

        if ($('#first').hasClass('active')) {
            Left.fadeOut();

        }
        else {
            Left.fadeIn(1000);

        }

        if ($('#last').hasClass('active')) {
            Right.fadeOut();

        }
        else {
            Right.fadeIn(1000);

        }

        if ($('#one').hasClass('active')) {
            Right.fadeOut();
            Left.fadeOut();
        }
    }
    checkClients();
    //back and after

    console.log($('.Slid i').filter("[id='right']"));
    $('.Slid i').click(function ()
     {
        if ($(this).hasClass('fa fa-chevron-right'))
        {
            $('.active').fadeOut(100, function () {
                console.log($('.Slid i').filter("[id='right']"));
                $(this).removeClass('active').next('.Icons').addClass('active').fadeIn();
                checkClients();
            });
        }

        else {
            $('.active').fadeOut(100, function () {
                console.log("uuue");
                console.log($('.Slid i').filter("[id='left']"));
                $(this).removeClass('active').prev('.Icons').addClass('active').fadeIn();
                checkClients();
            });
        }
    });
})
