setInterval(() => {
    $.ajax({
        method: "GET",
        url: "/site/index",
    })
        .done(function (countAjax) {
            if ($("#requests span").text() !== countAjax) {

                $('#requests span')
                            .animate({
                                fontSize: "+=1em",
                            }, 200, function () {
                                $(this).text(countAjax);
                            })
                            .animate({
                                fontSize: "-=1em",
                            }, 200);

                let audio = new Audio('/sound/sound.mp3');
                audio.play();
            }
        });
}, 5000);


$('.thumbnail img')
    .mouseover(function () {
        if ($(this).attr('src') === $(this).attr('data-img-to')) return;
        $(this)
            .animate({
                width: "0%",
                height: "0%",
            }, 200, function () {
                $(this).attr('src', $(this).attr('data-img-to'));
            })
            .animate({
                width: "100%",
                height: "100%",
            }, 200);
    })
    .mouseleave(function () {
        if ($(this).attr('src') === $(this).attr('data-img-after')) return;
        $(this)
            .animate({
                width: "0%",
                height: "0%",
            }, 200, function () {
                $(this).attr('src', $(this).attr('data-img-after'));
            })
            .animate({
                width: "100%",
                height: "100%",
            }, 200);
    });
