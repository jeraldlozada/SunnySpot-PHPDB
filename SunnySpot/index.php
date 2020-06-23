<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sunnyspot Accommodation</title>
<link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<header> <img src="images/accommodation.png" alt="Accommodation">
  <h1>Sunnyspot Accomodation</h1>
</header>
<section>
  
            <?php
                // connect to DB
                require_once('inc/connect.inc.php');

                    //set up SQL statement
                    $query = 'select cabinType, cabinDescription, pricePerNight, pricePerWeek, photo from tblcabins';

                    //execute SQL
                    $result = mysqli_query($link, $query);
            
                    //check query
                    if(!$result) {
                        echo "Query error: ".
                        mysqli_error($link);
                        mysqli_close($link);
                        exit('<br>The query was not successful');
                    }
                    //find number of rows in result set
                    $rowCount = mysqli_num_rows($result);
            
                    //check if no records in result set
                    if($rowCount==0){
                        exit("No records found that satisfy criteria");
                    }

                    while($record = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    //store the field values in variables
                $cabinType = $record['cabinType'];
                $cabinDescription = $record['cabinDescription'];
                $pricePerNight = $record['pricePerNight'];
                $pricePerWeek = $record['pricePerWeek'];
                $photo = $record['photo'];

            ?>
            <article>
            <h2><?=$cabinType; ?></h2>
            <img src="images/<?=$photo; ?>" alt="<?=$cabinType; ?>">
            <p><span>Details: </span><?=$cabinDescription; ?> </p>
            <p><span>Price per night: </span><?=$pricePerNight; ?></p>
            <p><span>Price per week: </span><?=$pricePerWeek; ?></p>
            </article>              
            <?php
                    }
            mysqli_free_result($result);
            mysqli_close($link);
            ?>
    
  
</section>
<footer> <a href="admin/adminMenu.php">Admin</a> </footer>
</body>
</html>
