<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Library.</title>
    <link rel="stylesheet" href="/assets/landingPage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <!-- font Poppins -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Poppins';
        }
        body{
            height: 100vh;
            border-color: #000;
            background-image: url('https://nibble-images.b-cdn.net/nibble/original_images/perpustakaan-di-jakarta-10.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(9px);
          }
          .textWrapper{
            position: relative;
            top: 7.5pc;
          }

          .btnWrapper .btn-warning{
            height: 50px;
            border-radius: 15px;
            color: #fff;
            font-size: 20px;
            text-shadow: 3px 1px 1px black;
            border: none;
            transition: 1s;
          }
          .btnWrapper :hover{
            color: #ffc107;
            background-color: rgb(64, 64, 64);
            border: none;
            box-shadow: 1px 1px 1px white;
          }
    </style>
</head>
<body>
    <header class="container-fluid d-flex justify-content-end p-5">

    <div class="btnWrapper mx-3">  
      <a href="login.php">
        <button class="btn btn-warning" style="width: 115px;">Masuk</button>
      </a>     
    </div>
          
    <div class="btnWrapper">
      <a href="register.php">
        <button class="btn btn-warning" style="width: 115px;">Daftar</button>
      </a>
    </div>

    </header>

        <div class="textWrapper container text-center position-relative mt-sm-5">
            <div style="text-shadow: 2px 1px 1px black; width: 100%; height: 100%">
                <span style="color: white; font-size: 100px; font-family: Poppins; font-weight: 700; word-wrap: break-word">Your</span>
                <span style="color: #FFCA41; font-size: 100px; font-family: Poppins; font-weight: 700; word-wrap: break-word"> Library</span>
                <span style="color: white; font-size: 100px; font-family: Poppins; font-weight: 700; word-wrap: break-word">.</span>
            </div>
            
            <div style="text-shadow: 4px 1px 10px black; width: 100%; height: 100%; text-align: center; color: white; font-size: 20px; font-family: Poppins; font-weight: 400; word-wrap: break-word">“Mari, jelajahi perpustakaan yang sunyi, Jelma dari khazanah ilmu, harta tak ternilai.
                <br>Di dalamnya, ciptakanlah mimpi dan gagasan, Sebab di sana, hati akan tumbuh memahami.”<br/>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>