<?php
// Author: Oluwatomi
// Purpose: Used as a backbone for an assignment
?>
<!doctype html>
<html>
<head>
    <title>Search Results</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
<div id="container">
    <?php
    //Connect to db using root for username and blank password
    // We are asking for the database called 'books'
    // Note that we are creating a new connection object using mysqli, after we have that object called $db
    //    we can use it's functions and view its attributes
    @ $db = new mysqli('localhost', 'root', '', 'cis2288');

    // if mysqli_connect_errno() is set, we did not successfully connect. Here we deal with the error.
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database.  Please try again later.</body></html>';
        exit;
    }

    //FIRST_NAME as 'First Name', LAST_NAME as 'Last Name'

    //Order Detail Report Query
    $query = "SELECT EMP_ID as 'Employee ID',FIRST_NAME as 'First Name', LAST_NAME as 'Last Name', START_DATE as 'Start Date' FROM `employee`";


    //Append to where clause depending on number of URL Get variables

    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $db->real_escape_string($_GET['name']);
        $query .= " WHERE CONCAT(FIRST_NAME,' ', LAST_NAME) LIKE '%$name%'";
    }
    //Order by
    if (isset($_GET['orderBy']) && !empty($_GET['orderBy'])) {
        $orderBy = $db->real_escape_string($_GET['orderBy']);
        $query .= " Order by $orderBy ";
    }
    //Order direction must be after order by and before Limit
    if (isset($_GET['orderDirection']) && !empty($_GET['orderDirection'])) {
        $orderDirection = $db->real_escape_string($_GET['orderDirection']);
        $query .= $orderDirection;
    }

    //the limit should be the last thing
    if (isset($_GET['numberOfResults']) && !empty($_GET['numberOfResults'])) {
        $numOfResults = $db->real_escape_string($_GET['numberOfResults']);
        $query .= " LIMIT $numOfResults";
    }

    //    echo $query;

    $result = $db->query($query);

    $num_results = $result->num_rows;

    echo "<h2 class='results'>Search Results</h2>";

    //echo "<p>Total Results: $num_results</p>";

    if ($num_results > 0) {
        //  $result->fetch_all(MYSQLI_ASSOC) returns a numeric array of all the books retrieved with the query
        $employee = $result->fetch_all(MYSQLI_ASSOC);

        echo "<table class='table table-bordered table-striped table-hover'><tr>";
        //This dynamically retieves header names
        echo '<thead class="thead-light">';
        foreach ($employee[0] as $k => $v) {
            echo "<th>" . $k . "</th>";
        }
        echo '</thead>';
        echo "</tr>";
        //Create a new row for each book
        foreach ($employee as $employee) {
            echo "<tr>";
            foreach ($employee as $k => $v) {
                echo "<td>" . $v . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // if no results
        echo "<p>Sorry there are no entries in the database.</p>";
    }

    // frees up memory on our server
    $result->free();
    // isconnect our connection to the DB
    $db->close();
    echo "<a class= 'results' href='employeeSearch.php'>New Search</a>";

    ?>
    <p style="visibility: hidden">Extra Space</p>
</div>
</body>
</html>