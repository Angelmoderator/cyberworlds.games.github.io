@extends('blocks.layout')

@section('title') Search @endsection

@section('main_content')




    
    <!--Главная-->
    
    <main class="cell parent">
        <div class="main cell">

            <head><link rel="stylesheet" href="css/pages/search.css"></head>

            <?php 
      
                include(app_path().'/parser/simple_html_dom.php');
                include(app_path().'/parser/phpQuery-onefile.php');

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
                // $page = curlGetPage("https://store.steampowered.com/search/");
                // $html = str_get_html($page);

                // if ($errno = curl_errno($ch)) {
                //     $message = curl_strerror($errno);
                //     echo "cURL error ({$errno}):\n {$message}"; // Выведет: cURL error (35): SSL connect error
                // }
            ?>



            <div class="grid-x grid-margin-x game-list">
                <div class="cell small-12 medium-12 large-12 title"><h1 class="black">Каталог игр</h1></div>
                <div class="cell small-12 medium-8 large-8 ">

                   

                    <div class="search-info">
                        <h3>Найденно 3153 результатов</h3>
    
                        <label>Сортировать:
                            <select>
                                <option value="husker">С новых </option>
                                <option value="starbuck">Со старых</option>
                                <option value="hotdog">С недорогих</option>
                                <option value="apollo">С дорогих</option>
                                <option value="apollo">По названию</option>
                                <option value="apollo">По популярности</option>
                            </select>
                        </label>
                    </div>
                   
                    <?php


                        foreach ($pq->find("a.search_result_row") as $element) {

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
                    ?>
                    {{-- <div>
                        <a class="item_buy">
                            <img src="https://gamefarm.ru/img/store.steam.png" alt="">
                            <p>Command & Conquer Remastered Collection</p>
                            <span class="price_count">500 Р</span>
                          
                        </a>
                    </div>

                   <div>
                    <a class="item_buy">
                        <img src="https://gamefarm.ru/img/store.steam.png" alt="">
                        <p>Command & Conquer Remastered Collection</p>
                        <div>
                            <p class="price">-30%</p>
                            <span class="price_count">500 Р</span>
                        </div>
                       
                       
                    </a>
                   </div> --}}

                   

                </div>
               
               
                <div class="cell small-12 medium-4 large-3 search">
                    
    
                    <ul class="accordion" data-accordion data-multi-expand="true">
    
                        <li class="accordion-item is-active" data-accordion-item>
                            <!-- Accordion tab title -->
                            <a href="#" class="accordion-title">Цена</a>
                            
                            <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                            <div class="accordion-content" data-tab-content>
                                <div class="catalog-filter__block black">
                                    <div class="catalog-filter__range">
                                        <!--slider-->
                                        <div class="slider" data-slider  data-initial-end="75">
                                            <span class="slider-fill" data-slider-fill></span>
                                            <span class="slider-handle" data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
                                        
                                        
                                        </div>
                                        <!--slider-->
                                        <div class="input-number">
                                          
                                            <div> <span>До</span><input type="number" id="sliderOutput2"></div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- ... -->
                        <li class="accordion-item " data-accordion-item >
                        <!-- Accordion tab title -->
                        <a href="#" class="accordion-title">Жанры</a>
                    
                        <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                        <div class="accordion-content" data-tab-content>
                            
    
                            <?php 
                                $categories = array('Экшен' => 'action', 
                                                    'RPG' => 'adventure',
                                                    'Стратегий' => 'rpg',
                                                    'Симуляторы' => 'simulation',
                                                    'Гонки' => 'strategy',
                                                    'Приключения' => 'sports',
                                                    'Казуальные' => 'racing',
                                                    'Спорт' => 'casual',
                                                );
    
                                foreach($categories as $key => $value){
                                    echo     "<div class='switch'>
                                                <input class='switch-input' id='$value' type='checkbox' name='$value' data-type='genres' data-val='$value' value='$value'>
                                                <label class='switch-paddle' for='$value'>
                                                    <span class='show-for-sr'>Download Kittens</span>
                                                </label>
                                                <p>$key</p>
                                            </div> ";
                                }
                            ?>
    
                        </div>
                        </li>
                        <!-- ... -->
                        <!-- ... -->
                        <li class="accordion-item" data-accordion-item>
                            <!-- Accordion tab title -->
                            <a href="#" class="accordion-title">Метки</a>
                            
                            <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                            <div class="accordion-content" data-tab-content>
                                <?php 
                                    $categories = array('Выживание' => 'survival', 
                                                        'Открытый мир' => 'open-world',
                                                        'Зомби' => 'zombies',
                                                        'Тактика' => 'tactical',
                                                    );
    
                                    foreach($categories as $key => $value){
                                        echo     "<div class='switch'>
                                                    <input class='switch-input' id='$value' type='checkbox' name='$value' data-type='tags' data-val='$value' value='$value'>
                                                    <label class='switch-paddle' for='$value'>
                                                        <span class='show-for-sr'>Download Kittens</span>
                                                    </label>
                                                    <p>$key</p>
                                                </div> ";
                                    }
                                ?>
                            </div>
                        </li>
    
                        <!-- ... -->
                        <li class="accordion-item" data-accordion-item>
                            <!-- Accordion tab title -->
                            <a href="#" class="accordion-title">Режимы игры</a>
                            
                            <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                            <div class="accordion-content" data-tab-content>
                                <?php 
                                    $categories = array('Одиночная' => 'singleplayer', 
                                                        'Кооперативный режим' => 'coop',
                                                        'Сетеая игра' => 'multiplayer',
                                                    );
    
                                    foreach($categories as $key => $value){
                                        echo     "<div class='switch'>
                                                    <input class='switch-input' id='$value' type='checkbox' name='$value' data-type='categories' data-val='$value' value='$value'>
                                                    <label class='switch-paddle' for='$value'>
                                                        <span class='show-for-sr'>Download Kittens</span>
                                                    </label>
                                                    <p>$key</p>
                                                </div> ";
                                    }
                                ?>
                            </div>
                        </li>
    
                        
    
    
                       
                        <!-- ... -->
                    </ul>
                </div>
    
             
    
    
    
    
            </div>
    
    
    
            <!-- <div class="grid-x grid-margin-x">
                <div class="cell small-10">
                    <div class="slider" data-slider data-initial-start="50">
                    <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput3"></span>
                    <span class="slider-fill" data-slider-fill></span>
                    </div>
                </div>
                <div class="cell small-2">
                    <input type="number" id="sliderOutput1">
                </div>
            </div> -->
    
        </div>
    </main>

@endsection