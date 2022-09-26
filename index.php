<?php
$data = file_get_contents('https://api.coinstats.app/public/v1/coins?skip=0&limit=100&currency=INR');
$response = json_decode($data, true);
?>

<!DOCTYPE html>
<html>
<head>

<!--TITLE-->
<title>Crypto</title>

<!--SHORTCUT ICON-->
<link rel="shortcut icon" href="#">

<!--META TAGS-->
<meta charset="UTF-8">
<meta name="language" content="ES">
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"> 

<!--STYLE SHEET-->
<link rel="stylesheet" href="assets/css/main.css">

</head>
<body>

<!--MAIN-->
<main class="padding_2x">
    <table>
        <tr>
            <th>Rank</th>
            <th>Crypto</th>
            <th>Price</th>
            <th>1h%</th>
            <th>1d%</th>
            <th>1w%</th>
        </tr>
        <?php
        for($i=0; $i<100; $i++){   
            $rank = ''.$response["coins"]["$i"]["rank"].'';  
            $icon = ''.$response["coins"]["$i"]["icon"].''; 
            $name = ''.$response["coins"]["$i"]["name"].''; 
            $price = '<i class="fa fa-rupee"></i>'.number_format($response["coins"]["$i"]["price"], 2).''; 
            $priceChange1h = ''.$response["coins"]["$i"]["priceChange1h"].'%'; 
            $priceChange1d = ''.$response["coins"]["$i"]["priceChange1d"].'%'; 
            $priceChange1w = ''.$response["coins"]["$i"]["priceChange1w"].'%';
            preg_match("[-]",$priceChange1h) ? $_1h="style='color:var(--maroon)'" : $_1h="style='color:var(--green)'";
            preg_match("[-]",$priceChange1d) ? $_1d="style='color:var(--maroon)'" : $_1d="style='color:var(--green)'";
            preg_match("[-]",$priceChange1w) ? $_1w="style='color:var(--maroon)'" : $_1w="style='color:var(--green)'";
            echo'
                <tr>
                    <td>'.$rank.'</td>
                    <td class="flex"><img src="'.$icon.'" alt=""> '.$name.'</td>
                    <td>'.$price.'</td>
                    <td '.$_1h.'>'.$priceChange1h.'</td>
                    <td '.$_1d.'>'.$priceChange1d.'</td>
                    <td '.$_1w.'>'.$priceChange1w.'</td>
                </tr>
            ';
        }
        ?>
    </table>
</main>
</body>
</html>

