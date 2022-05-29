@section('header')

    <head><link rel="stylesheet" href="/css/blocks/header.css"></head>

    <!--Шапка-->
    
    <header class="cell small-12 grid-x align-justify">
        <div class="cell shrink grid-x">
            
            <div class="logo cell small-6 medium-4 large-6" style="width: 220px;"></div>
            <div class="     cell small-6 medium-6 large-6" style="width: 180px;">
               <ul class="dropdown menu" data-dropdown-menu>
                    <li>
                      <a href="{{route('about')}}">Games<img src="/image/icons/tetris.png" width="32px" style="margin-left: 10px;" alt=""> </a>
                       {{-- <ul class="elements menu">
                    <h5>Разделы</h5>                       
                        <li><a href=""><img src="/image/icons/submenu/game.svg" alt="">Игры</a></li>
                        <li><a href=""><img src="/image/icons/submenu/programs.svg" alt="">Программы</a></li>
                        <li><a href=""><img src="/image/icons/submenu/movie.svg" alt="">Фильмы</a></li>
                    <h5>Сообщество</h5>
                        <li><a href=""><img src="/image/icons/submenu/forum.svg" alt="">Форумы</a></li>
                        <li><a href=""><img src="/image/icons/submenu/clan.svg" alt="">Клубы</a></li>
                        <li><a href=""><img src="/image/icons/submenu/collection.svg" alt="">Подборка</a></li>
                        <li><a href=""><img src="/image/icons/submenu/article.svg" alt="">Статьй</a></li>
                        <li><a href=""><img src="/image/icons/submenu/players.svg" alt="">Игроки</a></li>
                    <h5>Информация</h5>
                        <li><a href="/about"><img src="/image/icons/submenu/about.svg" alt="">О сайте</a></li>
                        <li><a href="/questions"><img src="/image/icons/submenu/question.svg" alt="">Вопросы</a></li>
                        <li><a href="/social"><img src="/image/icons/submenu/social.svg" alt="">Соц сети</a></li>
                      </ul>--}}
                    </li>
                </ul> 
            </div>
        </div>
        <form class="small-12 medium-12 large-5 align-self-end grid-x search" action="search.blade.php" method="POST">

                <input  tooltip="Top Searches: Destiny Final Fantasy God of War Horizon" type="text" class="search-input" placeholder="Поиск..|" tooltip="" data-tooltip tabindex="1" title="Найди свою игру на сайте CyberWorlds_Games" data-position="bottom" data-alignment="left" class="search-start button"/>

                <button class="search-list button">Все категорий:</button>
                <a href="serch" class="search-start button primary" type="submit">Поиск_</a>

        </form>
        <div class="cell small-12 medium-12 large-2 grid-x align-middle align-right login">
            <div class="cell shrink cart"  data-tooltip tabindex="1" title="Список игр в корзине" data-position="bottom" data-alignment="right" class="search-start button"><a href="{{route('cart')}}">Корзина</a></div>
            <div class="cell shrink enter" data-tooltip tabindex="1" title="Вход или регистрация" data-position="bottom" data-alignment="right" class="search-start button"><a href="{{route('enter')}}">Войти</a></div>
        </div>
    </header>

