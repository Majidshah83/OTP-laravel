<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>

    <center>
        <h1>
            <span class="hr">1</span>:
            <span class="min">1</span>:
            <span class="sec">5</span>
        </h1>
        <h1 id="demo"></h1>
    </center>

    {{-- <script>
        function makeid() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 0; i < 8; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));
            // return text;
            document.getElementById("name").innerHTML = text;
            document.getElementById("id").value = text;

        }

        window.onload = makeid();

    </script> --}}

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
    var Update = function () {
        $('.sec').each(function() {
            var count = parseInt($(this).html());
            if(count !== 0){
                $(this).html(count - 1);
            }
            if(count === 0){
                $.ajax()
            }
        });
    };
    setInterval(Update, 1000);
});
    </script>


    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}

</body>
</html>