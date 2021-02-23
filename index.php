<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="styles.css">
    
    <title>Rent-a-car MP</title>
</head>
<body>

    <!-- Navigation -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">

    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="img/rentlogo.png" width="100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Početna stranica</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user/userPage.php">Klijenti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="car/carPage.php">Vozila</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rentings/rentingsPage.php">Iznajmljivanja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">O nama</a>
                </li>
            </ul>
        </div>
    </div>

    </nav>
    <!-- Image Slider -->

    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/prva.jpg" alt="First picture">
                <div class="carousel-caption">
                    <h1 class="display-2">Dobro došli</h1>
                    <h3>Rent a car po najpristupačnijim cenama</h3>
                    
                    
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/druga.jpg" alt="Second picture">
            </div>
            <div class="carousel-item">
                <img src="img/treca.jpg" alt="Third picture">
            </div>
        </div>
    </div>

    <!-- Jumbotron-->

    <div class="container-fluid">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                <p class="lead">
                Rezervišite automobil po vašoj meri po najpristupačnijim cenama!
                </p>
            </div>
        </div>
    </div>

    <!-- Welcome Section-->

    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">O nama</h1>
            </div>
            <hr>
            <div class="col-12">
                <p>
                    Rent-a-car MP je kompanija osnovana 2016-te godine sa sedištem u Malom Požarevcu. Posedujemo preko dvadeset vozila različitih namena i trenutno smo pozicionirami kao lider na tržištu rentiranja automobila u našem regionu.
                </p>              
            </div>
        </div>
    </div>

   

   

    <!-- Footer -->

    <footer>

<div class="container-fluid padding">
    <div class="row text-center">
        <div class="col-md-6">
            <img src="img/rentlogo.png" width="90px">
            <hr class="light">
            <p>telefon 011/2000-200</p>
            <p>support@rentacarmp.rs</p> 
            <p>Srecka Jovanovica 50, Mali Pozarevac</p>          
        </div>
        <div class="col-md-6">                   
            <hr class="light">
            <h5>Radno vreme</h5>
            <hr class="light">
            <p>Ponedeljak-Subota: 10-18 sati</p>
            <p>Nedelja: zatvoreno</p>
        </div>
    </div>
    <div class = 'row text-center'>
        <div class="col-12 ">
            <hr class="light-100" >
            <h5>&copy; Rent-a-carMP</h5>
        </div>
        
        
    </div>
</div>

</footer>

</body>
</html>