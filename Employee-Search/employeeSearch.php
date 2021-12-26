<!--Author: Oluwatomi-->
<!--Date: 2021/11/23-->
<!--Description: An application to search a database-->
<!doctype html>
<html>
<head>
    <title>Employee Search Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
    <div class="login-form">
        <form action="employeeSearchResults.php" method="GET">
            <h2 class="text-center">Employee Search</h2>
            <div class="form-group">
                <label for="name">Employee Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Employee name" name="name">
            </div>
            <div class="form-group">
                <label for="numberOfResults">Number of Results:</label>
                <select class="form-control" name="numberOfResults" id="numberOfResults">
                    <option value=2>2</option>
                    <option value=5 selected="selected">5</option>
                    <option value=10>10</option>
                    <option value=15>15</option>
                </select>
            </div>
            <div class="form-group">
                <label for="orderBy">Order By:</label>
                <select class="form-control" name="orderBy" id="orderBy">
                    <option value=EMP_ID>Employee ID</option>
                    <option value=FIRST_NAME>First Name</option>
                    <option value=LAST_NAME>Last Name</option>
                    <option value=START_DATE>Start Date</option>
                </select>
            </div>
            <div class="form-group">
                <label for="orderDirection">Order Direction:</label>
                <select class="form-control" name="orderDirection" id="orderDirection">
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Descending</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Search Orders</button>
            </div>
        </form>
    </div>
</body>
</html>