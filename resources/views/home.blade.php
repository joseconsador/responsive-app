<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="/css/app.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container wrapper">
            <div class="container main">
                <div class="row">
                    <div class="details-col col-md-3 col-sm-12">
                        <h5 class="mb-4">Contact Information</h5>
                        <p class="contact-link"><a href="tel:+1(555)123-4567"><ion-icon name="call-outline"></ion-icon> +1(555)123-4567</a></p>
                        <p class="contact-link"><a href="mailto:support@liquidfish.com"><ion-icon name="mail-outline"></ion-icon> support@liquidfish.com</a></p>
                        <p class="contact-link social-links">
                            <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
                            <a href=""><ion-icon name="logo-github"></ion-icon></a>
                            <a href=""><ion-icon name="logo-twitter"></ion-icon></a>                            
                        </p>
                    </div>
                    <div class="form-col col-md-9 col-sm-12">
                        <div id="app">
                            <h5 class="mb-3"><b>Send us a message</b></h5>
                            <contact csrf-token="{{ csrf_token() }}"></contact>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="/js/app.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
