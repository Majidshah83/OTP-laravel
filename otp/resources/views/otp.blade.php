<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    --}}

    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Enter Otp for dashboard Login</h1>
        <form method="POST" enctype="multipart/form-data" action="{{url('check_form')}}">
            @csrf
            <div class="success-message"></div>
            <div class="form-group">
                <label for="exampleInputEmail1">OTP</label>
                <input type="text" class="form-control" aria-describedby="otp" name="otp" placeholder="Enter OTP Here...">
                <div id="count-down">30</div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-success mt-2" id="show"><a href="{{url('resend-otp')}}" class="text-white">resend otp</a></button>
                </div>
            </div>
        </form>
    </div>  

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
                var Update = function () {
                    $('#count-down').each(function() {
                        var count = parseInt($(this).html());
                        if(count !== 0){
                            $(this).html(count - 1);
                        }
                        if(count == 0){
                            $("show").show();
                            // document.getElementById("count-down").innerHTML = "Time expired"
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });  

                            $.ajax({
                                url:"/null-token",
                                type: "GET",
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(response)
                                {
                                    // console.log(response);
                                    // alert(response);
                                    $('.success-message').html();
                                    $('.success-message').addClass('alert alert-success');
                                    $('.success-message').text(response.message, 2000);
                                },
                            });
                            abort();
                        }
                    });
                };
                setInterval(Update, 1000);
            });
    </script>


</body>
</html>