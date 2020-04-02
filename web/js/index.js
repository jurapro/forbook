setInterval(() => {
    $.ajax({
        method: "GET",
        url: "/site/index",
    })
        .done(function (countAjax) {
            if ($("#requests span").text() !== countAjax) {

                $("#requests span").text(countAjax);

                let audio = new Audio('/sound/sound.mp3');
                audio.play();
            }
        });
}, 5000);

$('.request').mouseover(function (){
    $(this).children().animate({
        width: "0%",
        height:"0%",
    },1500);
});

$('.request').mouseleave(function (){
    $(this).children().animate({
        width: "100%",
        height:"100%",
    },1000);
});
