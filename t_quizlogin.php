<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanu Global Student Quiz Portal |Login</title>
    <link rel="stylesheet" href="css/t_quizlogin.css">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="container">

        <div class="row pt-5">
            <div class="left col-lg-6 col-md-12 col-sm-12">
                <div class="content">
                    <img src="resourses/sanu-log (1).png" alt="" width="20%" style="margin-bottom: 20px;">
                    <h1 style=" font-size: 30px;">Sanu Global <span style="color: #e5322d; font-size: 25px; font-weight: 400;">Academy,</span> </h1>
                    <h4 style=" font-size: 23px; font-weight: bold;">Admin Panel</h4>
                    <h5 style=" font-size: 31px; font-weight: bold; margin-bottom: 30px;">Teachers Login</h5>

                </div>


            </div>
            <div class="right col-lg-6 col-md-12 col-sm-12">
                <div class="alert alert-danger align-content-center mt-3 ps-0 pt-0 m-0 d-none " role="alert" style="height: 30px;  display: flex; " id="erroshow">
                    labelA simple danger alert—check it out!
                </div>
                <div class="content-2">
                    <label for="uname" class="lab">User Name:</label><br>
                    <input type="text" id="uname" class="entry_f uname " placeholder="Enter User Name" onclick="hidealert();"><br>
                    <label for="pw" class="lab">Password:</label><br>
                    <input type="password" id="pw" class="entry_f pw" placeholder="Enter Password" onclick="hidealert();"><br>

                    <button class="btn btn-primary log-btn" onclick="login();">Login</button><br>
                    <a href="https://oneteraweb.com/" class="copytag" style="text-decoration: none;">Created by @OneTera System_Solutions.</a>
                </div>


            </div>
        </div>



    </div>


    <script src="js/script.js"></script>
</body>

</html>