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

