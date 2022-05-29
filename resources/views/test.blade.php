<?php 
      


include(app_path().'/parser/simple_html_dom.php');

// $cookie = '/cookie.txt'

function curlGetPage($url, $referer = 'https://google.com/'){



    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36 OPR/85.0.4341.75');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
    // curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
    // curl_setopt($ch, CURLOPT_COOKIESESSION, true);

    // CURLOPT_COOKIEFILE

    $response = curl_exec($ch);
    curl_close($ch);

  
    return $response;
}
$page = curlGetPage("https://store.steampowered.com/app/$id");
$html = str_get_html($page);

echo "<script>console.log( 'Выход из установщика' );</script>";

?>

<?php 

    echo "<script>console.log( 'Перед циклом' );</script>";


    $site 
    $site = "https://${site}/";
    foreach ($html->find('.responsive') AS $element) {


      $title = $element->find('#appHubAppName', 0);          
      $title = $title->plaintext;

      echo "<script>console.log( '$title' );</script>";



      $bread = $element->find('.blockbg', 0);
      $bread = str_replace('blockbg', 'bread', $bread);
      $bread = str_replace('&gt;', '', $bread);
      echo "<script>console.log( '$bread' );</script>";


      $price = $element->find('.game_purchase_price.price', 0);
      $price = $price->plaintext;
      echo "<script>console.log( '$price' );</script>";


      $release = $element->find('.date', 0)->plaintext;
      // $rating = $element->find('.', 0)->plaintext;
      $developer = $element->find('#developers_list', 0)->plaintext;
      $publisher = $element->find('.dev_row a', 1)->plaintext;


      $game_review_summary = $element->find('.user_reviews_summary_row .game_review_summary', 0)->plaintext;// . $element->find('.game_review_summary .responsive_hidden', 0)->plaintext
      $game_review_element = $element->find('.user_reviews_summary_row span.responsive_hidden', 0)->plaintext;
      $game_review_summary =   $game_review_summary . $game_review_element ;

      $game_review         = $element->find('.user_reviews_summary_row .game_review_summary', 1)->plaintext;// . $element->find('.game_review .responsive_hidden', 0)->plaintext
      $game_review_element = $element->find('.user_reviews_summary_row span.responsive_hidden', 1)->plaintext;
      $game_review =  $game_review . $game_review_element;


      $description = $element->find('#game_area_description.game_area_description', 0);
      $description  = str_replace('<h2>About This Game</h2>', '', $description );

      // echo $title;

      // <a href=''>Главная</a>
      //     <a href=''>Каталог игр</a>
      //     <a href=''>$title</a>


        // $databasepage = curlGetPage("https://steamdb.info/app/$id/");
        // $database = str_get_html($databasepage);
        // echo $database;

        // foreach ($database->find('.app-chart-numbers-big') AS $data) {
        //   echo $data;
        // } 
      
      ?>