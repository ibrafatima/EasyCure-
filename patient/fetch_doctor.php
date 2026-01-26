<?php
// Import database connection
include("../connection.php");

// Check if disease parameter is provided
if(isset($_GET["disease"])) {
    // Sanitize the input
    $disease = $database->real_escape_string($_GET["disease"]);

    // Query to fetch doctors based on the disease
    $query = "SELECT docname, docemail FROM doctor WHERE specialties LIKE '%$disease%'";
    
    // Execute the query
    $result = $database->query($query);

    // Check if there are any doctors found
    if($result && $result->num_rows > 0) {
        // Fetch the data
        $doctors = array();
        while($row = $result->fetch_assoc()) {
            $doctors[] = $row;
        }

        // Return the JSON response
        echo json_encode($doctors);
    } else {
        // Return an empty JSON array if no doctors found
        echo json_encode(array());
    }
} else {
    // Return an error message if disease parameter is not provided
    echo json_encode(array("error" => "Disease parameter is missing"));
}
?>
