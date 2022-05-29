@extends('blocks.layout')

@section('title') Release @endsection

@section('main_content')


<?php 

// include_once '../../parser/simple_html_dom.php';
// include '../../parser/simple_html_dom.php';
include(app_path().'/parser/simple_html_dom.php');

// print_r($_SERVER);

function curlGetPage($url, $referer = 'https://google.com/'){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

$page = curlGetPage('https://store.steampowered.com/explore/upcoming/');
$html = str_get_html($page);
?>



<main class="cell parent">
    <div class="main cell">


        <head>
            <link rel="stylesheet" href="css/pages/primary.css">
            <link rel="stylesheet" href="css/pages/release.css">
        </head>


      <div class="grid-x grid-margin-x">


            <div class="cell small-12 medium-12 large-12 title">
                <h1 class="black">Календерь релизов</h1>
            </div>

            <div class="cell small-12 medium-12 large-12 title">
                <?php
                    foreach ($html->find('s.comingsoon_headercap') AS $element) {

                        $img = $element->find('img', 0);
                        $img = $img->src;
                        $number = $element->href;
                        $price = $element->find('.discount_final_price', 0);

                        echo        "<div class='item mix'>
                                        <a itemprop='url' href='$number'>
                                            <div class='picture'> <img src='$img'/></div>
                                        
                                            <div class='item_inf'>
                                                <div class='item_title' title=''></div>


                                            </div>
                                        </a>
                                    </div>";
                    }   
                ?>
            </div>

            <div class="cell small-12 medium-12 large-8 release">
            
                    <?php

                    

                        foreach ($html->find('#tab_popular_comingsoon_content a.tab_item') AS $element) {
            
                            //Изоражение
                            $img = $element->find('.tab_item_cap_img', 0);
                            $img = $img->src;
            
                            // $img = str_replace('data-src', 'src', $img);
                            
                            //Номер
                            //   $number = $element->find('a', 0);
                            $number = $element->href;
                            $number = str_replace('https://store.steampowered.com/app', '/game', $number);
            
                            $name = $element->find('.tab_item_name', 0);
                            $name = $name->plaintext;
            
                            //Релиз
                            $release =  $element->find('.release_date', 0);
                            $release = $release->plaintext;
            
                            //Цена
                            $price = $element->find('.tab_item_discount', 0);
                            $price = $price->plaintext;
            
            
                                echo "<div class='item mix'>
                                                <a itemprop='url' href='$number'>
                                                <div class='picture'> <img src='$img'></div>
                                                <div class='percent-price'>$release</div>
                                                <div class='item_inf'>
                                                    <div class='item_title' title='$name'>$name</div>
                                                    <div class='item_price'><span>$price</span></div>
                    
                                                </div>
                                                </a>
                                            </div>";
                            }
                        ?>

            </div>

            <div class="cell small-12 medium-12 large-4" style="margin-top: 60px">

                <ul class='accordion' data-accordion data-multi-expand="true">


                    <?php 
                            foreach ($html->find('.store_horizontal_autoslider') AS $el) {


                                echo  "<li class='accordion-item is-active' data-accordion-item>
                                        <!-- Accordion tab title -->
                                        <a href='#' class='accordion-title'>ЛИДЕРЫ СПИСКОВ ЖЕЛАЕМОГО</a>
                                    
                                        
                                        <div class='accordion-content' data-tab-content>";

                              
                                foreach ($el->find('.capsule') AS $element) {

                                    $img = $element->find('img', 0);
                                    $img = $img->src;

                                    $number = $element->href;


                                    $price = $element->find('.discount_final_price', 0);



                                    echo        "<div class='item mix'>
                                                    <a itemprop='url' href='$number'>
                                                        <div class='picture'> <img src='$img'/></div>
                                                       
                                                        <div class='item_inf'>
                                                            <div class='item_title' title=''></div>
                                                            <div class='item_price'><span>$price</span></div>

                                                        </div>
                                                    </a>
                                                </div>";
                                    } 
                                    
                                    echo "</div> </li>";
                              
                            }    
                          ?>   
                    <!-- ... -->
                    {{-- <li class='accordion-item is-active' data-accordion-item>
                      <!-- Accordion tab title -->
                      <a href='#' class='accordion-title'>ЛИДЕРЫ СПИСКОВ ЖЕЛАЕМОГО</a>
                  
                     
                      <div class='accordion-content' data-tab-content>
                                          
                      </div>
                    </li>

                    <li class='accordion-item' data-accordion-item>
                      <!-- Accordion tab title -->
                      <a href='#' class='accordion-title'>В СПИСКЕ ЖЕЛАЕМОГО</a>

                     
                     
                      <div class='accordion-content' data-tab-content>
                        
                        
                      </div>
                    </li> --}}


                </ul>
            </div>

      
      </div>




    </div>
</main>

@endsection