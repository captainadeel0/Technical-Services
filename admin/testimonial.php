


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
        .word-limit-warning {
            color: red;
            display: none;
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
                    <a href="service.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Services</a>
                    <a href="project.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Projects</a>
                    <a href="./testimonial.php" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>Testimonials</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
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

<div class="container-fluid pt-4 px-4">
                <div class="row  bg-secondary rounded align-items-center justify-content-center mx-0">
                   
                


  <!-- add category container -->
  <div class="container mt-3 p-4">

<h3 class="text-light"> <i class="fa fa-plus text-danger"></i> Add Testimonials</h3>

<h3 class="d-flex justify-content-end"> <a href="show-testimonial.php" class=" text-light"><i class="fa fa-eye text-danger"></i> View Testimonials</a></h3>


<hr>

<form action="./add-testimonial-query.php" method="POST" enctype="multipart/form-data" class="row">

<div class="col-lg-12">
<label class="form-label" for="val-username">Description <span class="text-danger">*</span>
</label>

<?php
// Assuming the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = $_POST['description'];

    // Split the description into words and count them
    $words = preg_split('/\s+/', trim($description));
    $wordCount = count($words);

    if ($wordCount > 15) {
        // Handle the case where there are more than 15 words
        echo "Error: You can only enter up to 15 words.";
    } else {
        // Proceed with form processing (e.g., save to database)
        // Process and sanitize the input
        echo "Form submitted successfully.";
    }
}
?>

<textarea name="description" class="form-control" id="description" rows="5" placeholder="Enter here..."></textarea>
<p class="word-limit-warning" id="warning">You can only enter up to 15 words.</p></div>
<div class="col-lg-6 mt-3 input-group-lg">
        <label class="form-label" for="val-username">Client Name <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" id="val-username" name="client_name" placeholder="Enter here..." required>

 
        </div>     
        <div class="col-lg-6 mt-3 input-group-lg">
                                            <label class="form-label" for="image">Image <span class="text-danger">*</span>
                                            </label>
                                            <input type="file" class="form-control" id="image" name="image" placeholder="Enter here..." >
                                        </div>
       
                                        <div class="col-lg-6 mt-3 input-group-lg">
                                            <label class="form-label" for="profession">Profession <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="val-username" name="profession" placeholder="Enter here..." required>
 
                                        </div>
       





    <div class="container">
    <div class="row">
        <div class="col text-end">
            <button class="btn btn-light btn-lg mt-5 w-30">Add Testimonials</button>
        </div>
    </div>
</div>
</form>




</div>
            </div>


</div>
</div>

            
        
    </div>




        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>


    <script>
        document.getElementById('description').addEventListener('input', function() {
            let text = this.value;
            let wordCount = text.trim().split(/\s+/).length;

            if (wordCount > 15) {
                this.value = text.trim().split(/\s+/).slice(0, 15).join(' ');
                document.getElementById('warning').style.display = 'block';
            } else {
                document.getElementById('warning').style.display = 'none';
            }
        });
    </script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>