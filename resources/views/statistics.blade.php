@extends('blocks.layout')

@section('title') Статистика @endsection

@section('main_content')

<?php 

                // include(app_path().'/parser/simple_html_dom.php');
                // include(app_path().'/parser/phpQuery-onefile.php');

                // $cookie = '/cookie.txt';
                // $headers = array(
                //     'cache-control: max-age=0',
                //     'upgrade-insecure-requests: 1',
                //     'user-agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36',
                //     'sec-fetch-user: ?1',
                //     'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
                //     'x-compress: null',
                //     'sec-fetch-site: none',
                //     'sec-fetch-mode: navigate',
                //     'accept-encoding: deflate, br',
                //     'accept-language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7',
                // );
                
                // $ch = curl_init('https://steamdb.info/');
                // curl_setopt($ch, CURLOPT_TIMEOUT, 100);
                // curl_setopt($ch, CURLOPT_COOKIEFILE, __DIR__ . '/cookie.txt');
                // curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__ . '/cookie.txt');
                // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                // curl_setopt($ch, CURLOPT_HEADER, true);

                // $html = curl_exec($ch);
                // $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                // curl_close($ch);

                // echo $html;
               
                // $pq = phpQuery::newDocument($html);

                // echo $pq;


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
                    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);//  
                    curl_setopt($ch, CURLOPT_TIMEOUT, 0);//
                    curl_setopt($ch, CURLOPT_HTTP_VERSION, 'CURL_HTTP_VERSION_1_1');//
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");//
                    curl_setopt($ch, CURLOPT_ENCODING, '');//
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
                $page = curlGetPage("https://steamdb.info/");
                $html = str_get_html($page);

                echo "<script>console.log( '$html' );</script>";

?>


<main class="cell parent">
    <div class="main cell">

        <head><link rel="stylesheet" href="css/pages/primary.css"></head>
        <head><link rel="stylesheet" href="css/pages/statistics.css"></head>


      <div class="grid-x grid-margin-x">
            <div class="cell small-12 medium-12 large-12 title">
                <h1 class="black">Статистика</h1>
            </div>

            <div class="cell small-12 medium-12 large-6 title">
                <ul class="accordion" data-accordion data-multi-expand="true">
                    <!-- ... -->
                    <li class='accordion-item' data-accordion-item>
                      <!-- Accordion tab title -->
                      <a href='#' class='accordion-title'>Самые популярные игры</a>
                  
                     
                      <div class='accordion-content' data-tab-content>

                        
                            foreach ($pq->find("tr.app") as $element) {

                                //Изоражение
                                $element = pq($element);
                                $img = $element->find('.applogo a img', 0);

                                //Название
                                $name = $element->find('.css-truncate', 0)->text();
                                // $name =  trim($name->plaintext);
                                // $name =  $name->plaintext;

                                //Скидка
                                $price_old =  $element->find('.text-center.green', 0);
                                if($price_old  == null){
                                    $price_old = '';
                                }
                                else {
                                    // $price_old =  $price_old->plaintext;
                                }


                                //Цена
                                $price =  $element->find('.text-center', 0);

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
                        ?>
                      </div>
                    </li>
                </ul>
            </div>

            <div class="cell small-12 medium-12 large-6 title">
                <ul class="accordion" data-accordion data-multi-expand="true">
                    <!-- ... -->
                    <li class='accordion-item' data-accordion-item>
                      <!-- Accordion tab title -->
                      <a href='#' class='accordion-title'>Трендовые игры</a>
                  
                     
                      <div class='accordion-content' data-tab-content>
                        {{-- "; 
    
    
                      foreach ($html->find('.popular_tags a.app_tag') AS $tag) {
    
                        $tag = str_replace('style="display: none;"', '', $tag);
                        $tag = str_replace('app_tag', 'app_tag label', $tag); 
    
                        echo $tag;
                      }
              
                                  
                      echo " --}}
                      </div>
                    </li>
                </ul>
            </div>

            <div class="cell small-12 medium-12 large-6 title">
                <ul class="accordion" data-accordion data-multi-expand="true">
                    <!-- ... -->
                    <li class='accordion-item' data-accordion-item>
                      <!-- Accordion tab title -->
                      <a href='#' class='accordion-title'>Популярные релизы</a>
                  
                     
                      <div class='accordion-content' data-tab-content>
                        {{-- "; 
    
    
                      foreach ($html->find('.popular_tags a.app_tag') AS $tag) {
    
                        $tag = str_replace('style="display: none;"', '', $tag);
                        $tag = str_replace('app_tag', 'app_tag label', $tag); 
    
                        echo $tag;
                      }
              
                                  
                      echo " --}}
                      </div>
                    </li>
                </ul>
            </div>

            <div class="cell small-12 medium-12 large-6 title">
                <ul class="accordion" data-accordion data-multi-expand="true">
                    <!-- ... -->
                    <li class='accordion-item' data-accordion-item>
                      <!-- Accordion tab title -->
                      <a href='#' class='accordion-title'>Горячие релизы</a>
                  
                     
                      <div class='accordion-content' data-tab-content>
                        {{-- "; 
    
    
                      foreach ($html->find('.popular_tags a.app_tag') AS $tag) {
    
                        $tag = str_replace('style="display: none;"', '', $tag);
                        $tag = str_replace('app_tag', 'app_tag label', $tag); 
    
                        echo $tag;
                      }
              
                                  
                      echo " --}}
                      </div>
                    </li>
                </ul>
            </div>

            



      </div>






    </div>
</main>


@endsection