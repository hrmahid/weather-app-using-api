
<?php
  error_reporting(0);
  $get = json_decode(file_get_contents('http://ip-api.com/json/'),true);
  date_default_timezone_get($get['timezone']);
  $city = $_GET['city'];
  $country = $_GET['country'];
  $string = "http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&units=metric&appid=86320d4de0dbbc2d10548b599f0541dd";
  $result = json_decode(file_get_contents($string),true);
  $temp = $result['main']['temp'];
  $icon = $result['weather'][0]['icon'];
  $visibility = $result['visibility'];
  $visibilitykm = $visibility / 1000; 
  $logo = "<center><img src='http://openweathermap.org/img/w/".$icon.".png'></center>";
  $desc = "<b>Description: <p>".$result['weather'][0]['description']."</p></b>";
  $temperature =  "<b>Temperature: ".$temp."°C</b><br>";
  $clouds = "<b>Clouds: ".$result['clouds']['all']."%</b><br>";
  $humidity = "<b>Humidity: ".$result['main']['humidity']."%</b><br>";
  $windspeed = "<b>Wind Speed: ".$result['wind']['speed']."m/s</b><br>";
  $pressure = "<b>Pressure: ".$result['main']['pressure']."hpa</b><br>";
  $visibility =  "<b>Visibility: ".$visibilitykm."Km</b><br>";
  $sunrise = "<b>Sunrise: ".date('h:i A', $result['sys']['sunrise'])."</b><br>";
  $sunset = "<b>Sunset: ".date('h:i A', $result['sys']['sunset'])."</b>";


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Weather Report of <?php echo $_GET['city']; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
    </head>
    <body>

<div class="uk-text-center" uk-grid>
    <div class="uk-width-expand ">
        <div class="uk-card uk-card-primary uk-card-body">
            <div class="uk-section uk-section-primary">
                <div class="uk-card uk-card-primary "><a href="index.php" uk-icon="icon:soundcloud; ratio: 6" ></a> 
                    <h4>The temperature of <?php echo $_GET['city'];?> , <?php echo $_GET['country'];?></h4>
                </div>
                <hr class="uk-divider-icon">
                <div class="uk-container uk-container-small">

                        <table class="uk-table uk-table-hover uk-table-divider">
                            <tbody>
                                <tr>

                                    <td><?php echo $logo; ?> <?php echo $temperature; ?> </td>
                                </tr>
                                <tr>
                                    <td><?php echo $desc; ?></td>
                                </tr>
                                 <tr>
                                    <td><?php echo $clouds; ?></td>                                  
                                 </tr>
                                  <tr>
                                    <td><?php echo $humidity; ?></td>                                  
                                 </tr>
                                  <tr>
                                    <td><?php echo $windspeed; ?></td>                                  
                                 </tr>
                                  <tr>
                                    <td><?php echo $pressure; ?></td>                                  
                                 </tr>
                                  <tr>
                                 <td><?php echo $visibility; ?></td>                              
                                 </tr>
                                  <tr>
                                    <td><?php echo $sunrise; ?></td>                                  
                                 </tr>
                                  <tr>
                                    <td><?php echo $sunset; ?></td>                                  
                                 </tr>
                            </tbody>
                      </table>         
                </div>
            </div>
        </div>
    </div>

</div>

    </body>
</html>
