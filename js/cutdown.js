
// Set the date we're counting down to
function leadingZero(i) {
    return (i < 10)? '0'+i : i;
}


$(document).ready(function() {

    var h = $('#h').val();
    var m = $('#m').val();
    var s = 0;

    console.log(h+' '+m);

    var countDownDate = new Date();
    var dzis = leadingZero(countDownDate.setHours(h))  + ":" + leadingZero(countDownDate.setMinutes(m))  + ":" +  leadingZero(countDownDate.setSeconds(s));


    console.log(countDownDate, dzis , h , m , s);

    // Update the count down every 1 second
    var x = setInterval(function() {

        
        // Get todays date and time
        var now = new Date().getTime();

        
        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="clockdiv"
        
        $('#hours').html(hours+"h");
        $('#minutes').html(minutes+"m");
        $('#seconds').html(seconds+"s");
        


        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            // document.getElementById("clockdiv").innerHTML = "00:00:00";

            $('#hours').html("<strong style=\"color:red;\">Koniec!</strong>");
            $('#minutes').html("");
            $('#seconds').html("");

            var endTime = "";
            $.ajax({
                type:"POST",
                url:"php/closeOrder.php",
                data: { "endTime": endTime},

                success:function() {

                    $('#fouKto').attr("disabled", true);
                    $('#fouCo').attr("disabled", true);
                    $('#fouCena').attr("disabled", true);
                    $('#submitOrderUser').attr("disabled", true);

                    $('#info').html('<div class="row"> <div class="col-md-12"> <div class="alert alert-success" style="text-align: center; margin-top: 10px;"> <strong>Zamówione!</strong> Kto nie zdążył niech radzi sobie sam. </div> </div> </div>');

                },
                error:function() {
                    alert("Wystapil blad!");
                }

            });

        }
    }, 1000);
});
