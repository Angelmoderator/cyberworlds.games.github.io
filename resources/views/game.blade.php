@extends('blocks.layout')

@section('title')  Игра  @endsection

@section('main_content')

<!--Главная-->

<main class="cell parent">
    <div class="main cell">

      <style>main{background-color: black;}</style>

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


          foreach ($html->find('.responsive') AS $element) {

            //  Пути
            $bread = $element->find('.blockbg', 0);
            $bread = str_replace('blockbg', 'bread', $bread);
            $bread = str_replace('&gt;', '', $bread);

            //  Название
            $title = $element->find('#appHubAppName', 0);          
            $title = $title->plaintext;


            //  Информация
              //релиз-разработчик-издатель
              $release = $element->find('.date', 0)->plaintext;
              $developer = $element->find('#developers_list', 0)->plaintext;
              $publisher = $element->find('.dev_row a', 1)->plaintext;


              //Обзоры недавние и все
              $game_review_summary = $element->find('.user_reviews_summary_row .game_review_summary', 0)->plaintext;
              $game_review_element = $element->find('.user_reviews_summary_row span.responsive_hidden', 0)->plaintext;
              $game_review_summary =   $game_review_summary . $game_review_element;
            

              $game_review = $element->find('.user_reviews_summary_row .game_review_summary', 1);
              if($game_review == null){
                  $game_review = '';
              }
              else {
                  $game_review_element = $element->find('.user_reviews_summary_row span.responsive_hidden', 1);
                  $game_review =  $game_review->plaintext . $game_review_element;
              }

            

            //  Цена, скидка и прошлая цена
              $price = $element->find('.game_area_purchase_game .price', 0);
              echo "<script>console.log( '$price' );</script>";
              $old_price = '';
              $discount = '';
              if($price == null){
                $price = $element->find('.discount_final_price', 0)->plaintext;
                $old_price = $element->find('.discount_original_price', 0)->plaintext;
                $discount = $element->find('.discount_pct', 0)->plaintext;
                echo "<script>console.log( 'fuck yeah' );</script>";
              }
            
            //Описание
            $description = $element->find('#game_area_description.game_area_description', 0);
            $description  = str_replace('<h2>About This Game</h2>', '', $description );


            echo " 
            
          
            <!--Пути-->
                $bread

              <!--/Пути-->
          
              <!--Заголовок-->
              <div class='grid-x grid-margin-x titlename'>
                <div class='cell small-12 medium-12 large-6 title black'><h1>$title</h1></div>
                <div class='cell small-12 medium-12 large-3 data'>
                  <div class='expanded button-group'>
                    <button class='button primary expanded' href='#'>498795 продаж</button>
                    <button class='button primary expanded' href='#'>18125 отзывов</button>
                    <button class='button primary expanded' href='#'>988840 просмотров</button>
                  </div>
                </div>
                <div class='cell small-12 medium-12 large-3 special' style='display:flex;justify-content:start;'>
                  <ul class='tabs' data-active-collapse=vtrue' data-tabs id='collapsing-tabs'>
                      <li class='tabs-title is-active'><a href='#panel2_1c' aria-selected='true'>Standart</a></li>
                      <li class='tabs-title'><a href='#panel2_1c'>DLC</a></li>
                      <li class='tabs-title'><a href='#panel2_1c'>Soundtrack</a></li>
                      <li class='tabs-title'><a href='#panel2_1c'>Deluxe</a></li>
                        <li class='tabs-title'><a href='#panel2_1c'>Echantion</a></li>
                    
                    </ul>
                </div>
              </div>
              <!--/Заголовок-->
          
              <!--Сведения-->
              <div class='grid-x grid-margin-x'>
          
                  <!--Фото и видео-->
                  <div class='cell small-12 medium-8 large-6 xlarge-4'>
                    <!--Слайдер Видео-->
                    <div class='orbit' role='region' aria-label='Favorite Space Pictures' data-orbit>
                      <div class='orbit-wrapper'>
          
                        <div class='orbit-controls'>
                          <button class='orbit-previous'>&#9664;&#xFE0E;</button>
                          <button class='orbit-next'>&#9654;&#xFE0E;</button>
                        </div>
                        
                        
                        
                        
                        <ul class='orbit-container'>"; 


                        foreach ($html->find('.screenshot_holder') AS $image) {

                          $image = $image->find("a", 0);
                          $image = $image->href;

                          echo    "<li class='orbit-slide'>
                                        <figure class='orbit-figure'>
                                          <img class='orbit-image' src='$image' alt='Space'>
                                        </figure>
                                      </li>";
                        }
                
                                    
            echo "
                      </div>          
                    </div>
                      <!--/Слайдер Видео-->
                  </div>
                  <!--/Фото и видео-->
          
          
                  <!--Инфорация-->
                  <div class='cell small-12 medium-4 large-3 align-center information'> 
          
                      
          
                      <table>
                          <tbody class='list-item'>
                            <tr>
                              <td>Релиз</td>
                              <td><a>$release</a></td>
                            </tr>
                            <!-- <tr>
                              <td>Рейтинг</td>
                              <td><a>81.3% (175,456 обзоров)</a></td>
                             </tr>
                            <tr> -->
                              <td>Разработчик</td>
                              <td><a>$developer</a></td>
                            </tr>
                            <tr>
                              <td>Издатель</td>
                              <td><a>$publisher</a></td>
                            </tr>
                            <tr>
                              <td>Недавние обзоры</td>
                              <td><a>$game_review_summary</a></td>
                            </tr>
                            <tr>
                              <td>Все обзоры</td>
                              <td><a>$game_review</a></td>
                            </tr>
                          </tbody>
                      </table>
                  </div>
          
                  <div class='cell small-12 medium-4 large-3 buy'>
          
                      <div class='black' style='border-left:10px solid #00FFF0'> 
          
                      
                        <div class='price'>
                          <div class='discount'>
                            <h4>$old_price</h4>
                            <p>$discount</p>
                          </div>
          
                          <h2>$price</h2>
          
                        
                        
                        </div>
          
                        <h3>Стандартная цена steam</h3>
                      </div>
                        
                      <a href='https://store.steampowered.com/app/$id/'>
                        <div class='btn'>
                          <button class='button primary expanded' >Купить</button>
                        </div>
                      </a>
                  </div>
                
                  <!--/Инфорация-->
                  
                  <!--</div>-->
          
          
          
          
            <!--<div class='grid-x grid-margin-x'>-->
              
                    <div class='cell small-12 medium-8 large-6 xlarge-6 description'>
                      <ul class='tabs' data-active-collapse='true' data-tabs id='collapsing-tabs' style='display:flex; justify-content:space-evenly;'>
                      <li class='tabs-title is-active'><a href='#panel1_4c' aria-selected='true'>Все предложения</a></li>
                        <li class='tabs-title'><a href='#panel1_1c' >Описание</a></li>
                        <li class='tabs-title'><a href='#panel1_2c'>Требования</a></li>
                        <li class='tabs-title'><a href='#panel1_3c'>Локализация</a></li>
                      </ul>
          
                        <div class='tabs-content black' data-tabs-content='collapsing-tabs'>
                          <!--Описание--> 
                          <div class='tabs-panel' id='panel1_1c'>
                            $description
                          </div>
                          <!--/Описание-->
                          <div class='tabs-panel' id='panel1_2c'>
          
                              <ul class='tabs' data-active-collapse='true' data-tabs id='collapsing-tabs'>
                                  <li class='tabs-title is-active'><a href='#panel1_10c' aria-selected='true'>Минимальные</a></li>
                                  <li class='tabs-title'><a href='#panel1_20c'>Рекомендуемые</a></li>
                              </ul>
          
                                <div class='tabs-content' data-tabs-content='collapsing-tabs'>
          
                                          <div class='tabs-panel is-active' id='panel1_10c'>
                                              <table>
                                                  <tbody class='list-item'>";

                                                    $count = true;

                                                    foreach ($html->find('.game_area_sys_req_leftCol ul.bb_ul li') AS $min) {

                                                        $min_value = $min;

                                                        $min_name = $min->find("strong", 0);
                                                        $min_name = str_replace(':', '', $min_name);
                                                        

                                                        if($count == true ){
                                                          echo    "<tr>
                                                                   
                                                                    <td><a>$min_value</a></td>";

                                                            $count = false;
                                                        }
                                                       
                                                        else if($count == false ){
                                                          
                                                          echo     "
                                                                    <td><a>$min_value</a></td>
                                                                </tr>";

                                                            $count = true;
                                                        }


                                                    }

                                                    
                                                    

                                                    echo  "

                                                 
          
                                                  </tbody>
                                              </table>
                                          </div>
                                          <div class='tabs-panel' id='panel1_20c'>
                                              <table>
                                                  <tbody class='list-item'>";

                                                      $count = true;

                                                      foreach ($html->find('.game_area_sys_req_rightCol ul.bb_ul li') AS $min) {

                                                          $min_value = $min;

                                                          $min_name = $min->find("strong", 0);
                                                          $min_name = str_replace(':', '', $min_name);
                                                          

                                                          if($count == true ){
                                                            echo    "<tr>
                                                                    
                                                                      <td><a>$min_value</a></td>";

                                                              $count = false;
                                                          }
                                                        
                                                          else if($count == false ){
                                                            
                                                            echo     "
                                                                      <td><a>$min_value</a></td>
                                                                  </tr>";

                                                              $count = true;
                                                          }


                                                      }




                                                      echo  "
                                                  </tbody>
                                              </table>
                                          </div>
          
                                </div>
                          </div>
                          <!--Локализация-->
                          <div class='tabs-panel' id='panel1_3c'>
                              <table>




                                
                                    <tbody>";


                                  foreach ($html->find('table.game_language_options tr') AS $td) {

                                    $td = str_replace('width: 94px; text-align: left', '', $td);
                                    $td = str_replace('display: none;', '', $td);
                                    $td = str_replace('width: 94px;', '', $td);
                                    $td = str_replace('&#10004;', '+', $td); 

                                    echo $td;
                                  }

                                


                          echo     "</tbody>
                                </table>
                          </div>
                          <!--Предложения-->
                          <div class='tabs-panel  is-active' id='panel1_4c'>";








                            $pagebuy = curlGetPage("https://gamefarm.ru/game/show/$id");
                            $buy  = str_get_html($pagebuy);

                            foreach ($buy->find('.block_with_coupon') AS $buygame) {

                              $img = $buygame->find(".offer_thumb.partner_thumb img", 0)->src;
                              $img =  'https://gamefarm.ru/' . $img;
                              $title = $buygame->find(".pricebox-gf-title", 0)->plaintext;
                              // $promo = $buygame->find("a", 0);
                              $price = $buygame->find(".price_count", 0)->plaintext;
                              $label = $buygame->find(".btn_offer_block", 0)->plaintext;
                             

                              echo    "<div class='item_discount'>
                                        <img src='$img' alt=''>
                                        <p>$title
                                          
                                        </p>

                                          <div class='price_count'>$price</div>
                                          <a href=''>$label</a>
                                       
                                    </div>";
                            }
                                              
                              
                  


                          
                      
          
                  echo  "
                          </div>
                        </div>
          
                    </div>
          
                  <div class='cell small-12 medium-4 large-3'>
          
                      <div class='game-age black'>
                        <div>
                          <img src='https://allgamse.ru/templates/AllGame/assets/img/crl/16.png'>
                          <p class='descriptorText'>ДЛЯ ДЕТЕЙ СТАРШЕ 16 ЛЕТ</p>
                        </div>
                        <div class='game_rating_agency'>Рейтинг от: Закон о рейтинге контента</div>
                      </div>
          
          
          
                  </div>
          
                  <div class='cell small-12 medium-8 large-3'>
                    <ul class='accordion' data-accordion>
                      <!-- ... -->
                      <li class='accordion-item' data-accordion-item>
                        <!-- Accordion tab title -->
                        <a href='#' class='accordion-title'>Теги</a>
                    
                       
                        <div class='accordion-content' data-tab-content>
                          "; 


                        foreach ($html->find('.popular_tags a.app_tag') AS $tag) {

                          $tag = str_replace('style="display: none;"', '', $tag);
                          $tag = str_replace('app_tag', 'app_tag label', $tag); 

                          echo $tag;
                        }
                
                                    
                        echo "
                        </div>
                      </li>
                      <!-- ... -->
                      <!-- ... -->
                      <li class='accordion-item' data-accordion-item>
                        <!-- Accordion tab title -->
                        <a href='#' class='accordion-title'>Категорий</a>
                      
                       
                        <div class='accordion-content' data-tab-content>
                          
                          "; 


                            foreach ($html->find('.game_area_details_specs_ctn') AS $label) {
                              echo $label;
                            }
                
                                    
                        echo "
                        </div>
                      </li>
                      <!-- ... -->
                      <!-- ... -->
                      <li class='accordion-item' data-accordion-item>
                        <!-- Accordion tab title -->
                        <a href='#' class='accordion-title'>Награды</a>

                        <div class='accordion-content' data-tab-content>        
                          ";


                              foreach ($html->find('#AwardsDefault .game_page_autocollapse img') AS $award) {

                                echo $award;

                              }
                              echo     "
                        </div>
                      </li>

                      <li class='accordion-item is-active' data-accordion-item>
                        <!-- Accordion tab title -->
                        <a href='#' class='accordion-title'>Достижения</a>
                    
                        <div class='accordion-content' data-tab-content>
                          ";


                          $achievement = $html->find("#achievement_block", 0);
                          echo $achievement;
                          
                          echo     "
                        </div>
                      </li>
                      <!-- ... -->
                      <!-- ... -->
                      <li class='accordion-item' data-accordion-item>    

                        <a href='#' class='accordion-title'>Ссылки</a>
                        <div class='accordion-content links' data-tab-content>
                          ";


                          foreach ($html->find('.details_block a.linkbar') AS $link) {
                            echo $link;
                          }
                          echo     "
                        </div>
                      </li>
                      <!-- ... -->
          
                    </ul>
                  </div>";
          }
    ?>
 
  
      </div>
  </main>

@endsection