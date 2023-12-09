<!-- Courses Start -->
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laravel";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
 

echo '<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Popular Courses</h1>
        </div>
        <div class="row g-4 justify-content-center">';

if ($result->num_rows > 0) {
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        // Access individual columns using $row['column_name']
        $duration = $row['duration'];
        $price = $row['price'];
        $course = $row['course_name'];
        $instructor = $row['instructor_name'];
        $capacity = $row['capacity'];
        $image = $row['avatar'];


        
            echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <div class="img-content">
                            <img class="img-fluid" src="../arabforit/storage/app/public/images/'. $image .'" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(123)</small>
                        </div>
                        <h5 class="mb-4">' . $course . '</h5>
                        <br>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>'. $instructor . '</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>'. $duration .'</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>'. $capacity .'</small>
                    </div>
                </div>
            </div>
        </div>';

    }
} else {
    echo "No data found.";
}
echo '</div>
</div>';
// Close the database connection
$conn->close();

?>

<!-- Courses End -->

