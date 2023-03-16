<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>DEB - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/logo/Final Logo DEB-ai (4).png') }}"
        type="image/x-icon" />
    <!-- External CSS libraries -->
    <!-- Bootstrap Css Link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/login4.css') }}">

</head>

<body id="top">

    <div class="login_page">

        <div class="row">
            @yield('content')
        </div>
    </div>



    <!-- External JS libraries -->
    {{-- <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/app.js"></script> --}}

    <script>
        let video_box = document.getElementsByClassName("video_box");
        let play_btn = document.getElementsByClassName("play_btn");
        let video_link =
            '<iframe width="560" height="315" src="https://www.youtube.com/embed/qZZm5rej9Zw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

        video_box[0].addEventListener("click", function() {
            video_box[0].innerHTML = video_link;
        });



        let passwordInput = document.querySelector(".passwordDiv input");
        let passwordIcon = document.querySelector(".passwordDiv span");

        passwordIcon.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordIcon.classList.remove("fa-eye");
                passwordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                passwordIcon.classList.add("fa-eye");
                passwordIcon.classList.remove("fa-eye-slash");
            }
        });



    </script>

    <!-- Custom JS Script -->
</body>

</html>
