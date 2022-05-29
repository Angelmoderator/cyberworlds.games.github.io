@section('navigation');
<head><link rel="stylesheet" href="/css/blocks/nav.css"></head>

<!--Навигация-->

<nav class="cell shrink navigation">
        <span>
            <a href="{{route('home')}}" data-tooltip tabindex="1" title="Переход на главную страницу" data-position="right" data-alignment="center">
                <img src="/image/icons/main.svg" alt="" >
                <p>Главная</p>
            </a>
            
            <a href="{{route('games')}}" data-tooltip tabindex="1" title="Разделение на жанры, особенности и т.д" data-position="right" data-alignment="center">
                <img src="/image/icons/gamepad.svg"  alt="">
                <p>Игры</p>
            </a>
            <a href="{{route('search')}}" data-tooltip tabindex="1" title="Расширеный поиск" data-position="right" data-alignment="center">
                <img src="/image/icons/search.svg" alt=""> 
                <p>Поиск</p>
            </a>
            <a href="{{route('release')}}" data-tooltip tabindex="1" title="Календарь с датой выхода еще не вышедших игр" data-position="right" data-alignment="center">
                <img src="/image/icons/calendar.svg" alt=""> 
                <p>Релиз</p>
            </a>
            <a href="{{route('news')}}" data-tooltip tabindex="1" title="Актуальные новости из индустрий развлечения" data-position="right" data-alignment="center">
                <img src="/image/icons/news.svg" alt="">
                <p>Новости</p>
            </a>
            <a href="{{route('collection')}}" data-tooltip tabindex="1" title="Личная подборка от игроков" data-position="right" data-alignment="center">
                <img src="/image/icons/library.svg" alt=""> 
                <p>Коллекция</p>
            </a>
            <a href="{{route('statistics')}}" data-tooltip tabindex="1" title="Ежедневная статистика игр" data-position="right" data-alignment="center">
                <img src="/image/icons/statistics.svg" alt=""> 
                <p>Статистика</p>
            </a>
        </span>

        <span>
            <a onClick="history.back();return false;"  data-tooltip tabindex="1" title="Вернуться на пред. страницу" data-position="right" data-alignment="center">
                <img src="/image/icons/back.svg" alt=""> 
                <p>Назад</p>
            </a>
            <a href="{{route('error')}}" class="error" data-tooltip tabindex="1" title="Заметили ошибку, несостыковку напишите нам" data-position="right" data-alignment="center">
                <img src="/image/icons/error.svg" alt=""> 
                <p>Ошибка!</p>
            </a>
        </span>
       
        
    </nav>