@extends('blocks.layout')

@section('title')  Main @endsection

@section('main_content')

<head>
    <link rel="stylesheet" href="css/pages/primary.css">
</head>

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

            $page = curlGetPage('https://allgamse.ru/');
            $html = str_get_html($page);

            $post = [];


              // "files":[
                    // 	"app/parser/simple_html_dom.php"
                    // ],

          ?>
    
    <!--Главная-->
    
    <main class="cell parent">
        <div class="main cell">


          <div class="grid-x grid-margin-x">


                <div class="cell small-12 medium-12 large-12 content">
                    <h3><p>Популярное и рекомендуемое</p></h3>
                </div>


                <div class="cell small-12 medium-12 large-12">
                    <!--Слайдер Видео-->
                    <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>



                        <div class="orbit-wrapper">
    
                            <div class="orbit-controls">
                              <button class="orbit-previous">&#9664;&#xFE0E;</button>
                              <button class="orbit-next">&#9654;&#xFE0E;</button>
                            </div>

                            

    
                            <ul class="orbit-container">

                            
                              <?php 

                                  $page = curlGetPage('https://gamefarm.ru/top-sales-steam/');
                                  $html = str_get_html($page);
                                  foreach ($html->find('.news.clearfix.gf-game-in-list') AS $element) {

                                    //Изоражение
                                    $img = $element->find('.slider_post.gf_game_list_image', 0);
                                    // $img = str_replace('data-src', 'src', $img);
                                    $img = $img->style;
                                    
                                    //Номер
                                    $number = $element->find('a', 0);

                                    $name = $element->find('h3 a', 0);
                                    $name = $name->plaintext;
                                    
                                    $number = $number->href;
                                    $number = str_replace('/game/show', '', $number);
                                

                                    //Название
                                    // $name = $element->find('.item_title', 0);
                                    // $name = $name->plaintext;
                                    // $name =  trim($name->plaintext);
                                    // $name =  $name->plaintext;
            
                                    //Скидка
                                    $price_old =  $element->find('.btn_offer_block', 0);
                                    $price_old = $price_old->plaintext;
                                    $price_old = str_replace('Получить скидку ', '', $price_old);$price_old = str_replace('Подписаться на обновление цен', '', $price_old);
            
                                    //Цена
                                    $price = $element->find('.price_count ins', 0);
                                    $price = $price->plaintext;

                                    // $img = substr($img, 0, 16) . 'https://zaka-zaka.com/' . substr($img, 16, 40);

                                    


                                    echo "<li class='is-active orbit-slide'>
                                            <figure class='orbit-figure'>
                
                                              <a href='/game$number'>
                                                <div class='main-slider__item-bg' style='$img ></div>
                                                <div class='main-slider__item-desc'>
                                                  <div class='main-slider__item-title'> $name</div>
                                                  <div class='main-slider__item-price-wr'>
                                                    <div class='main-slider__item-discount'> $price_old</div>
                                                    <div class='main-slider__item-price'>
                                                      <span class='main-slider__item-old-price'></span>
                                                      $price
                                                    </div>
                                                  </div>
                                                </div>
                                              </a>
                                              
                                            </figure>
                                          </li>";
                  
                                    
                                  }
                              ?>
    
                              {{-- <li class="is-active orbit-slide">
                                <figure class="orbit-figure">
    
                                  <a href="main-slider__item-main">
                                    <div class="main-slider__item-bg" style="background-image: url('./assets/image/background.jpg') " ></div>
                                    <div class="main-slider__item-desc">
                                      <div class="main-slider__item-title">Hardspace Shipbreaker</div>
                                      <div class="main-slider__item-price-wr">
                                        <div class="main-slider__item-discount">-30</div>
                                        <div class="main-slider__item-price">
                                          <span class="main-slider__item-old-price">1800</span>
                                          500
                                        </div>
                                      </div>
                                    </div>
                                  </a>
                                  
                                </figure>
                              </li>
    
                          
    
                              <li class="orbit-slide">
                                <figure class="orbit-figure">
                                  <img class="orbit-image" src="./assets/image/games/photo/Game4.jpg" alt="Space">
                                </figure>
                              </li> --}}
    
                            </ul>

                        </div>



                    </div>

                </div>
              </div>

           
    
    
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-12 large-12">

                    <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
                      <li class="tabs-title is-active"  aria-selected="true"><a href="#panel1_1c">ТОП ПРОДАЖ ЗА НЕДЕЛЮ</a></li>
                      <li class="tabs-title"><a href="#panel1_2c">СВЕЖИЕ СКИДКИ</a></li>
                      <li class="tabs-title"><a href="#panel1_3c">СКИДКИ НА ПОПУЛЯРНЫЕ ИГРЫ</a></li>
                    </ul>
    
                    <div class="tabs-content black" data-tabs-content="collapsing-tabs">
                        <div class="tabs-panel is-active" id="panel1_1c">
                          <?php 

                              //https://gamefarm.ru/top-sales-steam/
                              $page = curlGetPage('https://gamefarm.ru/hotsales/');
                              $html = str_get_html($page);


                              foreach ($html->find('.news.clearfix.gf-game-in-list') AS $element) {
          
                                //Изоражение
                                $img = $element->find('.slider_post.gf_game_list_image', 0);
                                // $img = str_replace('data-src', 'src', $img);
                                $img = $img->style;
                                
                                //Номер
                                $number = $element->find('a', 0);

                                $name = $element->find('h3 a', 0);
                                $name = $name->plaintext;
                                
                                $number = $number->href;
                                $number = str_replace('/game/show', '', $number);
                            

                                //Название
                                // $name = $element->find('.item_title', 0);
                                // $name = $name->plaintext;
                                // $name =  trim($name->plaintext);
                                // $name =  $name->plaintext;
        
                                //Скидка
                                $price_old =  $element->find('.btn_offer_block', 0);
                                $price_old = $price_old->plaintext;
                                $price_old = str_replace('Получить скидку ', '', $price_old);$price_old = str_replace('Подписаться на обновление цен', '', $price_old);
        
                                //Цена
                                $price = $element->find('.price_count ins', 0);
                                $price = $price->plaintext;

                                // $img = substr($img, 0, 16) . 'https://zaka-zaka.com/' . substr($img, 16, 40);

                                echo   "<div class='item mix'>
                                            <a itemprop='url' href='/game$number'>
                                              <div class='picture'> <img style='$img'> </div>
                                              <div class='percent-price'>$price_old</div>
                                              <div class='item_inf'>
                                                  <div class='item_title' title='$name'>$name</div> 
                                                  <div class='item_price'><span>$price</span></div>
                  
                                              </div>
                                            </a>
                                        </div>";
                              }
                          ?>
                        </div>

                        <div class="tabs-panel" id="panel1_2c">
                          <?php 

                              
                              $page = curlGetPage('https://gamefarm.ru/discounts');
                              $html = str_get_html($page);


                              foreach ($html->find('.news.clearfix') AS $element) {
          
                                //Изоражение
                                $img = $element->find('.slider_post.gf_game_list_image', 0);
                                // $img = str_replace('data-src', 'src', $img);
                                $img = $img->style;
                                
                                //Номер
                                $number = $element->find('a', 0);

                                $name = $element->find('h3 a', 0);
                                $name = $name->plaintext;
                                
                                $number = $number->href;
                                $number = str_replace('/game/show', '', $number);
                            
                                //Скидка
                                $price_old =  $element->find('.btn_offer_block', 0);
                                $price_old = $price_old->plaintext;
                                $price_old = str_replace('Получить скидку ', '', $price_old);$price_old = str_replace('Подписаться на обновление цен', '', $price_old);
        
                                //Цена
                                $price = $element->find('.price_count ins', 0);
                                $price = $price->plaintext;


                                echo   "<div class='item mix'>
                                            <a itemprop='url' href='/game$number'>
                                              <div class='picture'> <img style='$img'> </div>
                                              <div class='percent-price'>$price_old</div>
                                              <div class='item_inf'>
                                                  <div class='item_title' title='$name'>$name</div> 
                                                  <div class='item_price'><span>$price</span></div>
                  
                                              </div>
                                            </a>
                                        </div>";
                              }
                          ?>
                        </div>

                        <div class="tabs-panel" id="panel1_3c">
                          <?php 

                            
                            $page = curlGetPage('https://gamefarm.ru/bestsellers');
                              $html = str_get_html($page);


                              foreach ($html->find('.news.clearfix') AS $element) {
          
                                //Изоражение
                                $img = $element->find('.slider_post.gf_game_list_image', 0);
                                // $img = str_replace('data-src', 'src', $img);
                                $img = $img->style;
                                
                                //Номер
                                $number = $element->find('a', 0);

                                $name = $element->find('h3 a', 0);
                                $name = $name->plaintext;
                                
                                $number = $number->href;
                                $number = str_replace('/game/show', '', $number);
                            

                                //Название
                                // $name = $element->find('.item_title', 0);
                                // $name = $name->plaintext;
                                // $name =  trim($name->plaintext);
                                // $name =  $name->plaintext;
        
                                //Скидка
                                $price_old =  $element->find('.btn_offer_block', 0);
                                $price_old = $price_old->plaintext;
                                $price_old = str_replace('Получить скидку ', '', $price_old);$price_old = str_replace('Подписаться на обновление цен', '', $price_old);
        
                                //Цена
                                $price = $element->find('.price_count ins', 0);
                                $price = $price->plaintext;

                                // $img = substr($img, 0, 16) . 'https://zaka-zaka.com/' . substr($img, 16, 40);

                                echo   "<div class='item mix'>
                                            <a itemprop='url' href='/game$number'>
                                              <div class='picture'> <img style='$img'> </div>
                                              <div class='percent-price'>$price_old</div>
                                              <div class='item_inf'>
                                                  <div class='item_title' title='$name'>$name</div> 
                                                  <div class='item_price'><span>$price</span></div>
                  
                                              </div>
                                            </a>
                                        </div>";
                              }
                          ?>
                        </div>
                    </div>

                </div>
            </div>

          <!---->
          <div class="grid-x grid-margin-x">
            <div class="wrapper tabsjs">
                          <?php 
                              foreach ($html->find('.wrapper.tabsjs') AS $element) {
          
                                //Изоражение
                                $img = $element->find('img', 0);


                                echo   "<a href='https://AllGamse.ru/game/gta5/'>$img" ;
                              }
                          ?>
                    {{-- <a href="https://AllGamse.ru/game/gta5/"><img src="https://AllGamse.ru/uploads/posts/2022-02/1643803204_banner1591097672.webp" style="width: 100%;"/></a> --}}
            </div>
          </div>
    
    
        </div>
    </main>

@endsection