@extends('blocks.layout')

@section('title')  Игра  @endsection;

@section('main_content')

<!--Главная-->

<main class="cell parent">
    <div class="main cell">

      <style>main{background-color: black;}</style>


<?php 



    include(app_path().'/parser/simple_html_dom.php');
    include(app_path().'/parser/phpQuery-onefile.php');

    // $cookie = '/cookie.txt';

    // function curlGetPage($url, $referer = 'https://google.com/'){



    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36 OPR/85.0.4341.75');
    //     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_REFERER, $referer);
    //     curl_setopt($ch, CURLOPT_HEADER, 0);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //     // curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
    //     // curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
    //     // curl_setopt($ch, CURLOPT_COOKIESESSION, true);

    //     // CURLOPT_COOKIEFILE

    //     $response = curl_exec($ch);
    //     curl_close($ch);

    
    //     return $response;
    // }
    //     $page = curlGetPage('https://store.steampowered.com/search/');
    //     $html = str_get_html($page);
    //     echo $html;
    //     echo "<script>console.log( '$html' );</script>";
        

            $cookie = '/cookie.txt';
                $headers = array(
                    'cache-control: max-age=0',
                    'upgrade-insecure-requests: 1',
                    'user-agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36',
                    'sec-fetch-user: ?1',
                    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
                    'x-compress: null',
                    'sec-fetch-site: none',
                    'sec-fetch-mode: navigate',
                    'accept-encoding: deflate, br',
                    'accept-language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7',
                );
                
                $ch = curl_init('https://store.steampowered.com/search/');
                curl_setopt($ch, CURLOPT_TIMEOUT, 100);
                curl_setopt($ch, CURLOPT_COOKIEFILE, __DIR__ . '/cookie.txt');
                curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__ . '/cookie.txt');
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HEADER, true);

                $html = curl_exec($ch);
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
               
               


                $pq = phpQuery::newDocument($html);
                // var_dump($pq);

                $title = $pq->find('.search_capsule', 0);//->html() ->text();
                echo $title;

                $a = $pq->find("a.search_result_row");

                // foreach($a as $value) {
                    
                //     $element = pq($value);
                //     $data['image'][] = $element->attr("src");//это массив и он читается вне объекта с номером пример в низу

                //     echo '<pre>';
                //     print_r($element->attr("src"));
                //     print_r($element->find("span.title")->text());
                //     echo '</pre>';
                // }
                // echo "<div class='grid-x grid-margin-x'>";
                    
                foreach ($a as $element) {

                    //Изоражение
                    $element = pq($element);
                    $img = $element->find('.search_capsule img', 0);

                    //Название
                    $name = $element->find('.title', 0)->text();
                    // $name =  trim($name->plaintext);
                    // $name =  $name->plaintext;

                    //Скидка
                    $price_old =  $element->find('.search_discount span', 0);
                    if($price_old  == null){
                        $price_old = '';
                    }
                    else {
                        // $price_old =  $price_old->plaintext;
                    }


                    //Цена
                    $price =  $element->find('.responsive_secondrow.search_price', 0);

                    echo "<div class='cell small-12 medium-12 large-8'>
                            <div>
                                <a class='item_buy'>
                                    <div class='picture'>
                                        $img
                                    </div> 
                                
                                    <p>$name</p>
                                    <div class='margin-auto'>
                                        <p class='price'>$price_old</p>
                                        <span class='price_count'>$price</span>
                                    </div>
                                </a>
                            </div>
                        </div>";
                }

                echo "</div>";

                // print_r($data);

echo "<script>console.log( 'Выход из установщика' );</script>";

    echo "<script>console.log( 'Перед циклом' );</script>";


    // foreach ($html->find('.responsive') AS $element) {


    //   $title = $element->find('#appHubAppName', 0);          
    //   $title = $title->plaintext;

    //   echo "<script>console.log( '$title' );</script>";



    //   $bread = $element->find('.blockbg', 0);
    //   $bread = str_replace('blockbg', 'bread', $bread);
    //   $bread = str_replace('&gt;', '', $bread);
    //   echo "<script>console.log( '$bread' );</script>";




    //   $price = $element->find('.game_area_purchase_game .price', 0);
    //         echo "<script>console.log( '$price' );</script>";
    //         $old_price = '';
    //         $discount = '';
    //         if($price == null){
    //           $price = $element->find('.discount_final_price', 0)->plaintext;
    //           $old_price = $element->find('.discount_original_price', 0)->plaintext;
    //           $discount = $element->find('.discount_pct', 0)->plaintext;
    //         echo "<script>console.log( 'fuck yeah' );</script>";
    //         }
    //         echo "<script>console.log( '$price' );</script>";
    //         echo "<script>console.log( '$old_price' );</script>";
    //         echo "<script>console.log( '$discount' );</script>";


    //     $release = $element->find('.date', 0)->plaintext;
    //     // $rating = $element->find('.', 0)->plaintext;
    //     $developer = $element->find('#developers_list', 0)->plaintext;
    //     $publisher = $element->find('.dev_row a', 1)->plaintext;

    //     echo "<script>console.log( '$release ' );</script>";
    //     echo "<script>console.log( '$developer' );</script>";
    //     echo "<script>console.log( '$publisher' );</script>";


    //     $game_review_summary = $element->find('.user_reviews_summary_row .game_review_summary', 0)->plaintext;// . $element->find('.game_review_summary .responsive_hidden', 0)->plaintext
    //     $game_review_element = $element->find('.user_reviews_summary_row span.responsive_hidden', 0)->plaintext;
    //     $game_review_summary =   $game_review_summary . $game_review_element;
    //     echo "<script>console.log( '$game_review_summary' );</script>";

    //     $game_review = $element->find('.user_reviews_summary_row .game_review_summary', 1);// . $element->find('.game_review .responsive_hidden', 0)->plaintext
    //     if($game_review == null){
    //         $game_review = '';
    //         }
    //         else {
    //             $game_review_element = $element->find('.user_reviews_summary_row span.responsive_hidden', 1); echo "<script>console.log( '$game_review_element . +++++' );</script>";
    //             $game_review =  $game_review->plaintext . $game_review_element;
    //         }

    //     echo "<script>console.log( '$game_review . +++++' );</script>";


    //     $description = $element->find('#game_area_description.game_area_description', 0);
    //     $description  = str_replace('<h2>About This Game</h2>', '', $description );

    // }
?>

</div>
</main>

@endsection