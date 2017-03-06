window.onload = function() {
    var span = document.getElementById("counter");
    var counter = Number(span.innerText);

    var timerId = setInterval(function() {
                        counter--;
                        if(counter <= 0)
                        {
                            clearInterval(timerId);
                            window.location.replace("../index.php");
                        }
                        span.innerText = counter;
                      }, 1000);

}
