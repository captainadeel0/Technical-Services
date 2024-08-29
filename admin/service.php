


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>


<style>
    /* Default style hides the image */
.mobile-only {
    display: none; /* Hide the image by default */
}

/* Media query to show the image only on mobile devices */
@media (max-width: 768px) {
    .mobile-only {
        display: block; /* Show the image on screens 768px wide or less */
        max-width: 100%; /* Ensure the image scales correctly */
        height: auto; /* Maintain aspect ratio */
    }
}

</style>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand ">
                   <a href="./index.php"><img src="./img/logo.png" width="200px" alt=""></a>
                </a>
                <div class="d-flex align-items-center ms-4 mt-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="./img/admin.png" alt="" style="width: 40px; height: 40px;">
                        
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">
                        
  

                            
                        </h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link  mt-3"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="./message.php" class="nav-link" ><i class="fa fa-laptop me-2" ></i>Messages</a>
                        
                    </div>
                    <a href="./admin.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Admins</a>
                    <a href="user.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Users</a>
                    <a href="quoto.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Quotos</a>
                    <a href="service.php" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>Services</a>
                    <a href="project.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Projects</a>
                    <a href="./testimonial.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Testimonials</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>


                <a href="./index.php">
                  <img src="./img/logo.png" alt="Logo" class="responsive-img mobile-only">
                   </a>
                
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                          <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex">Options</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="./logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            

          <!-- view categories container -->
          <div class="row m-0">
                    <div class=" col-lg-11 mx-auto my-4 bg-secondary p-4">
            <h3 class="text-light"> <i class="fa fa-eye text-danger"></i>Services</h3>
            <hr>

            <div class="d-flex justify-content-end">
                <h3><a href="./add-service.php" class="text-light"><i class="fa fa-plus text-danger"></i> Add Service</a></h3>
            </div>

            <div class="table-responsive mt-2">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Service Type</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php
     require_once("./db-con.php");
$select = "SELECT * FROM services";
$result = mysqli_query($con, $select);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {


?>



                    <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><img src="./img/service/<?php echo $row['image'] ?>" height="50px" alt=""></td>
                            <td><?php echo $row['service_type'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                           
                            <td>
                             
                            <a href="delete-service.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service?');">Delete</a>
                            </td>
                           </td>
                        </tr>

                        <?php
                            }
                        }

                        ?>


                    </tbody>
                </table>
            </div>

        </div>


        </div>

        </div>
        <!-- Content End -->

        


    <!-- JavaScript Libraries -->
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>