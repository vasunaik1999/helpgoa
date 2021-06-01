<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        @media (max-width: 767.98px) {
            img {
                width: 90%;
                margin-top: 20%;
            }

            .error-text {
                font-size: 30px !important;
                margin-top: 50px !important;
            }
        }

        @media (max-width: 991.98px) {
            img {
                width: 90%;
                margin-top: 20%;
            }

            .error-text {
                margin-top: 50px;
            }
        }

        @media (max-width: 1199.98px) {
            img {
                width: 90%;
                margin-top: 30% !important;
            }

            .error-text {
                margin-top: 40px;
                font-size: 50px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 d-flex justify-content-center">
                <img src="{{asset('img/error/404.svg')}}" alt="" width="65%" style="margin-top: 4%;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-4 error-text" style="color: grey;"><strong>Page Not Found, Return back to home</strong> </h1>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>