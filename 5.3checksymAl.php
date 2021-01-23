
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-eHealth</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    
</head>
<body>
</section>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
      <a class="navbar-brand" href="#">
          <img src="img1/logo.jpeg" width="150" height="100" alt="App logo">
        </a>
        <a class="navbar-brand" href="#" id="logo"><b><h1>Covid-eHealth</h1></b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<section>
    <div class="container"></div>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
              <img src="img1/frame1.png" alt="covide img" style="width:100%;">
              <div class="carousel-caption">
               <div id="cb" class="login-dark">
                   
                  <form method="POST" action="5.3checksymAl.php">
                   <?php
                        session_start();
                        $conn = mysqli_connect("localhost", "root", "","covid-ehealth");
                        if(isset($_POST['submit'])){ 
                            $etatgrip=$_POST['etat'];
                            $sql1 = "SELECT COUNT(*) as nbrlignes FROM patient";
                            $run_query=mysqli_query($conn,$sql1);
                            $row=mysqli_fetch_array($run_query);
                             $id99 =$row['nbrlignes'];
                              $_SESSION["w"]= $id99;
                            if($etatgrip!=''){
                             $sql = "INSERT INTO identification (NumId,sym_etatGrip) VALUES ('$id99','$etatgrip') ";
                             $run_query=mysqli_query($conn,$sql);
                            }
                         
                            if( isset($_POST['checka'])){
                             $sql = "UPDATE identification SET sym_fievre=1 WHERE NumId=$id99";
                             $run_query=mysqli_query($conn,$sql);   
                            }
                            if(isset($_POST['checkb'])){
                                $sql = "UPDATE identification SET sym_diarhee=1 WHERE NumId=$id99";
                                $run_query=mysqli_query($conn,$sql);
                            }
                            if(isset($_POST['checkc'])){
                                $sql = "UPDATE identification SET sym_anosmie=1 WHERE NumId=$id99";
                                $run_query=mysqli_query($conn,$sql);
                            }
                            if(isset($_POST['checkd'])){
                                $sql = "UPDATE identification SET sym_cephalee=1 WHERE NumId=$id99";
                                $run_query=mysqli_query($conn,$sql);
                            }
                            if(isset($_POST['checke'])){
                                $sql = "UPDATE identification SET sym_mauxGorge=1 WHERE NumId=$id99";
                                $run_query=mysqli_query($conn,$sql);
                            }
                            if($run_query){
                               echo "<script>alert('Success!')</script>";
                               header('Location:http://localhost/boostrap%20fich1/5.4checkAntAl.php');
                              exit;
                           }
                           else{
                               echo "<script>alert('Error!please repeat the process')</script>";
                           }      
                        }

                       ?>
                        <div id="soutitre" ><h3>les symptomes du patient</h3></div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox"> 
                            <br>
                          <div class="form-group"> <input type="checkbox"  class="form-group" name="checka" value="fievre"><label>La fièvre</label></div>
                          <div class="form-group"><input type="checkbox" class="form-group" name="checkb" value="diarhee"><label>La diarhée</label></div>
                          <div class="form-group"> <input type="checkbox" class="form-group"  name="checkc" value="anosmie"><label>anosmie</label></div>
                          <div class="form-group"><input type="checkbox" class="form-group" name="checkd" value="cephalee"><label>La céphalée</label></div>
                          <div class="form-group"><input type="checkbox" class="form-group" name="checke" value="maux"><label>Des maux de gorge</label></div>
  
                            
                            <select class="form-control form-control-sm" id="etat" name="etat">
                                                                <option>Etat grippal</option>
                                                                <option>Etat parfait</option>
                                                                <option>Toux sèche</option>
                                                                <option>des myalgies</option>
                                                                <option>des arthralgies</option>
                            </select> 
                            <br>  
                            <div class="form-group"> <input class="btn btn-primary btn-block" class="form-group" type="submit" name="submit" value="enregistrer"></div> 
                          </div>  
                        </div>
                   </form>
                </div>
                
              </div>
 </section> 
 

</body>
<footer class="page-footer font-small unique-color-dark">

    <div style="background-color:#212529;">
      <div class="container">
  
        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">
  
          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h5 class="mb-0">Get connected with us on social networks!</h5>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">
  
            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fab fa-facebook-f white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fab fa-twitter white-text mr-4"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g white-text mr-4"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fab fa-linkedin-in white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram white-text"> </i>
            </a>
  
          </div>
          <!-- Grid column -->
  
        </div>
        <!-- Grid row-->
  
      </div>
    </div>
  
    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">
  
      <!-- Grid row -->
      <div class="row mt-3">
  
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
  
          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">App goal</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>l'application <b> Covid-eHealth</b> vise à gestionner les patients atteints par le covid 19 au sein d'un hopital  </p>
  
        </div>
        <!-- Grid column -->
  
        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
  
          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Products</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">MDBootstrap</a>
          </p>
          <p>
            <a href="#!">MDWordPress</a>
          </p>
          <p>
            <a href="#!">BrandFlow</a>
          </p>
          <p>
            <a href="#!">Bootstrap Angular</a>
          </p>
  
        </div>
        <!-- Grid column -->
  
        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
  
          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Useful links</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">Your Account</a>
          </p>
          <p>
            <a href="#!">Become an Affiliate</a>
          </p>
          <p>
            <a href="#!">Shipping Rates</a>
          </p>
          <p>
            <a href="#!">Help</a>
          </p>
  
        </div>
        <!-- Grid column -->
  
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
  
          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fas fa-home mr-3"></i> 32, Angle Avenue Oqba et Fal ouled oumeir, Rabat</p>
          <p>
            <i class="fas fa-envelope mr-3"></i> Covid-eHealth@gmail.com</p>
          <p>
            <i class="fas fa-phone mr-3"></i> 06 61 45 76 23</p>
          <p>
            
        </div>
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
    
  
  </footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</html>