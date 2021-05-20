<!-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Nav Bar</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;

        }

        body {
            display: flex;
            /* justify-content: center; */
            /* align-items: center; */
            min-height: 100vh;
            background-color: #6843d1;
        }

        .container {
            position: relative;
        }

        .container .navigation {
            position: relative;
            width: 80px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: 0.5s;
            height: 100%;
        }

        .container .navigation.active {
            width: 230px;
        }

        .container .navigation ul {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .container .navigation ul li {
            position: relative;
            list-style: none;
            width: 100%;

        }

        .container .navigation ul li a {
            position: relative;
            display: block;
            width: 100%;
            display: flex;
            text-decoration: none;
            color: #6843cf;
            font-weight: 500;
            align-items: center;
        }

        .container .navigation ul li:hover {
            background: #6843cf;
            opacity: 0.6;
        }

        .container .navigation ul li:hover .navbar-title,
        .container .navigation ul li:hover .icon {
            color: white;
        }

        .container .navigation ul li a .icon {
            position: relative;
            display: block;
            min-width: 80px;
            text-align: center;
            font-size: 24px;
        }

        .container .navigation ul li a .navbar-title {
            position: relative;
            display: block;
            font-size: 20px;
            height: 60px;
            line-height: 60px;
            text-align: center;
            white-space: nowrap;
        }


        .toggle {
            position: absolute;
            top: calc(50% - 20px);
            right: -20px;
            width: 40px;
            height: 40px;
            background: #f5f5f5;
            cursor: pointer;
            border: 5px solid #6843d1;
            border-radius: 50%;
        }

        .toggle:before {
            content: '\f054';
            font-family: fontAwesome;
            position: absolute;
            width: 100%;
            height: 100%;
            line-height: 30px;
            text-align: center;
            font-size: 16px;
            color: #6843d1;
        }

        .toggle.active:before {
            content: '\f053';

        }
    </style>
</head>

<body>

    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="navbar-title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="navbar-title">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-comment"></i></span>
                        <span class="navbar-title">Message</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-question-circle"></i></span>
                        <span class="navbar-title">Help</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="navbar-title">Setting</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-lock"></i></span>
                        <span class="navbar-title">Password</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-sign"></i></span>
                        <span class="navbar-title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="toggle">

        </div>
    </div>

    <script>
        const navigation = document.querySelector('.navigation');
        document.querySelector('.toggle').onclick = function() {
            this.classList.toggle('active');
            navigation.classList.toggle('active');
        }
    </script>

</body>

</html> -->