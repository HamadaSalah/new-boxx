$(document).ready(function()
{
//         $(".selectThis").toggle(
//   function(){$(this).css({"color": "red"});},
//   function(){$(this).css({"color": "blue"});}
// });
// $(".selectThis").toggle(
//     function(){$(this).css({"color": "red"});},
//     function(){$(this).css({"color": "blue"});}
//     );


    // $('.selectThis').on('click',function(){
    //     if($(this).attr('data-click-state') == 1) {
    //         $(this).attr('data-click-state', 0);
    //         $(this).css('background-color', 'red')
    //       }
    //     else {
    //       $(this).attr('data-click-state', 1);
    //       $(this).css('background-color', 'orange')
    //     }
    //   });
    var x=0;
    $(".checkBOX").on('change', function() {
        if(this.checked) {
            $(this).parent().css({"background": "#2a2a44"});
            x = x+1;
            $('.BOXNO').html('+'+x);
            if(x == 0) {$('.checkoutNow').attr('disabled','true');}
            else {$('.checkoutNow').removeAttr("disabled");}
        }
        else if(!this.checked) {
            $(this).parent().css({"background": "#80facd"});
            x = x-1;
            $('.BOXNO').html('+'+x);
            if(x == 0) {$('.checkoutNow').attr('disabled','disabled');}
            else {$('.checkoutNow').removeAttr("disabled");}

        }
    });

});

// Set the date we're counting down to
var Mydate = document.getElementById("MyCounter").innerHTML;
var countDownDate = new Date(Mydate).getTime();

// Update the count down every 1 second
var x = setInterval(function() {
    function convertTZ(date, tzString) {
        return new Date(new Date(date).toLocaleString("en-US", {timeZone: tzString}));
    }

  // Get today's date and time
  var now = new Date().getTime();
  now = convertTZ(now, "Asia/Qatar")

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="MyCounter"
  document.getElementById("MyCounter").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  document.getElementById("MyCounter").style.opacity = 1;
  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("MyCounter").innerHTML = "Time Finsihed";
    document.getElementById("MyCounter").style.fontFamily = "inherit";
    document.getElementById("MyCounter").style.fontSize = '25px';
    if(distance == -1000) {location.reload();}
  }
}, 1000);
