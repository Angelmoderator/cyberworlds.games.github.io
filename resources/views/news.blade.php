@extends('blocks.layout')

@section('title')  Игра  @endsection

@section('main_content')

<head><link rel="stylesheet" href="css/pages/news.css"></head>
<script src="js/jQuery.scrollSpeed.js"></script>

<script>
    $(function() {  

    // Default
    jQuery.scrollSpeed(100, 800);

    // Custom Easing
    jQuery.scrollSpeed(200, 1600, 'easeOutCubic');

    });
</script>

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
      $page = curlGetPage("https://vgtimes.ru/tags/Обзоры+видеоигр/");
      $html = str_get_html($page);

    //   foreach ($html->find('.item-main') AS $element){
    //       echo $element;
    //   }

    ?>

    <div class='grid-x grid-margin-x titlename'>
        <div class="cell small-12 medium-12 large-12 title">
            <h1 class="black">Обзоры игр на PC, PS4, XBOX One и других платформах</h1>
        </div>

        
        <div class="cell small-12 medium-12 large-12">
            <h3 class="black">
            </h3>
        </div>

        <div class="cell small-12 medium-12 large-7 grid-x grid-margin-x">
            <div class="cell small-12 medium-12 large-12"></div>  
      


        <?php

                foreach ($html->find('.item-main') AS $element) {

                    //  Название
                    $title = $element->find('.item-name', 0)->plaintext;          

                    //  Время
                    $time = $element->find('.news_item_time', 0)->plaintext;   

                    //  Информация
                    $info = $element->find('.item-text div', 0);

                    //  Картинка
                    $img = $element->find('.image_wrap a', 0);
                    $img = str_replace('src="data', 'data-trash="dara', $img );
                    $img = str_replace('data-src="', 'src="https://vgtimes.ru', $img );
                    $img = str_replace('width=', '', $img );
                    $img = str_replace('height=', '', $img );

                    // https://vgtimes.ru/uploads/posts/2022-05/obzor-dol…avit-miyadzaki-napryachsya-87843-m.jpg?1653400847
            

                    echo "  <div class='cell small-12 medium-12 large-12 news'>
                                <div class='news_item'>
                                    <div class='news_title'><h1>$title</h1></div>
                                    <div class='news_time'>$time</div>
                                    <div class='news_image'>$img</div>
                                    <div class='news_text'>$info</div>
                                </div>
                            </div>";
                }
        ?>

            
        </div>
        <div class="cell small-12 medium-12 large-5 fixed">
            <div class="scroll_panel">
                <a href="#" id="scroll_top"><span>↑ Наверх</span></a>
                <a href="#" id="scroll_bottom"><span>↓ Вниз</span></a>
            </div>
        </div>

        <script>
            $(function(){
                $('#scroll_top').click(function(){
                    $('html, body').animate({scrollTop: 0}, 5000);
                    return false;
                });
                
                $('#scroll_bottom').click(function(){
                    $('html, body').animate({scrollTop: $(document).height() - $(window).height()}, 600);
                    return false;
                });
            });
        </script>

      
  {{-- echo "  <div class='cell small-12 medium-12 large-7 news'>
                <div class='news_item'>
                    <div class='news_title'><h1>Обзор Sniper Elite 5. Стрелять немцам по яйцам никогда не надоедает</h1></div>
                    <div class='news_time'>Сегодня, 17:27</div>
                    <div class='news_image'>
                        
                        <a href=''>
                            <img src='https://vgtimes.ru/uploads/posts/2022-05/obzor-dolmen.-souls-like-s-lavkraftovskimi-ideyami-kotoryy-zastavit-miyadzaki-napryachsya-87843-m.jpg?1653400847' alt=''>
                        </a>
                    </div>
                    <div class='news_text'>На днях вышла Sniper Elite 5. Это экшен, где крутому снайперу предстоит бродить по живописным локациям и отстреливать немецким солдатам жизненно важные органы. Но весело ли заниматься этим уже в пятый раз? Я прошёл новинку и спешу поделиться впечатлениями!</div>
                </div>
            </div>"; --}}

    </div>

    

</div>
</main>

@endsection