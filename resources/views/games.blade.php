@extends('blocks.layout')

@section('title') Games @endsection

@section('main_content')

<!--Главная-->

<head> <link rel="stylesheet" href="css/pages/games.css"> </head>

<main class="cell parent">
    <div class="main cell">

    <div class="grid-x grid-margin-x">

        <div class="cell small-12 medium-6 large-6 catalog">
            <div class="catalog-head content">
                <h3><p>Жанры</p></h3>
            </div>
            <div class="catalog-nav">
                <nav>
                    <ul class="catalog-list">
                        <?php 
                            $categories = array('Экшен' => 'action', 
                                                'Приключения' => 'adventure',
                                                'Ролевые(RPG)' => 'rpg',
                                                'Симуляторы' => 'simulation',
                                                'Стратегий' => 'strategy',
                                                'Спорт' => 'sports',
                                                'Гонки' => 'racing',
                                                'Казуальные' => 'casual',
                                                'Все игры' => 'games',
                                            );

                            foreach($categories as $key => $value){
                                echo    "<li class='catalog-item'><a href='/$value' class='catalog-link'>
                                        <div class='catalog-icon'> <img src='css/image/categories/$value.svg' width='50px' height='50px' class='catalog-img'></div>
                                        <span class='catalog-title'>$key</span> 
                                        </a></li>" ;
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="cell small-12 medium-6 large-6 catalog">
            <div class="catalog-head content">
                <h3><p>По цене</p></h3>
            </div>
            <div class="catalog-nav">
                <nav>
                    <ul class="catalog-list">
                        <?php 
                            $categories = array('до 99 ₽'           => '99', 
                                                'до 199 ₽'          => '199',
                                                'до 399 ₽'          => '399',
                                                'до 599 ₽'          => '599',
                                                'до 799 ₽'          => '799',
                                                'Предзаказ'         => 'coming-soon',
                                                'Акций и скидки'    => 'special?sort=popular',
                                            );

                            foreach($categories as $key => $value){
                                echo    "<li class='catalog-item'><a href='/$value' class='catalog-link'>
                                        <div class='catalog-icon'> <img src='css/image/categories/$value.svg' width='50px' height='50px' class='catalog-img'></div>
                                        <span class='catalog-title'>$key</span> 
                                        </a></li>" ;
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="cell small-12 medium-6 large-6 catalog">
            <div class="catalog-head content">
                <h3><p>По режиму игры</p></h3>
            </div>
            <div class="catalog-nav">
                <nav>
                    <ul class="catalog-list">
                        <?php 
                            $categories = array('Одиночные' => 'windows', 
                                                'Мультиплеер' => 'linux',
                                                'Кооператив' => 'Co-op',
                                                'Локальная сеть' => 'xbox',
                                                'Кроссплатформа' => 'playstation',
                                            );

                            foreach($categories as $key => $value){
                                echo    "<li class='catalog-item'><a href='/$value' class='catalog-link'>
                                        <div class='catalog-icon'> <img src='css/image/categories/$value.svg' width='50px' height='50px' class='catalog-img'></div>
                                        <span class='catalog-title'>$key</span> 
                                        </a></li>" ;
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="cell small-12 medium-6 large-6 catalog">
            <div class="catalog-head content">
                <h3><p>По характеристикам</p></h3>
            </div>
            <div class="catalog-nav">
                <nav>
                    <ul class="catalog-list">
                        <?php 
                            $categories = array('Вирт. реал' => 'windows', 
                                                'Подд. геймпад' => 'linux',
                                                'Дост. steam' => 'mac',
                                                'Карточки' => 'xbox',
                                                'Мастерская' => 'playstation',
                                            );

                            foreach($categories as $key => $value){
                                echo    "<li class='catalog-item'><a href='/$value' class='catalog-link'>
                                        <div class='catalog-icon'> <img src='css/image/categories/$value.svg' width='50px' height='50px' class='catalog-img'></div>
                                        <span class='catalog-title'>$key</span> 
                                        </a></li>" ;
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="cell small-12 medium-6 large-6 catalog">
            <div class="catalog-head content">
                <h3><p>По платформе</p></h3>
            </div>
            <div class="catalog-nav">
                <nav>
                    <ul class="catalog-list">
                        <?php 
                            $categories = array('Windows' => 'windows', 
                                                'Linux' => 'linux',
                                                'Mac' => 'mac',
                                                'Xbox' => 'xbox',
                                                'Playstation' => 'playstation',
                                            );

                            foreach($categories as $key => $value){
                                echo    "<li class='catalog-item'><a href='/$value' class='catalog-link'>
                                        <div class='catalog-icon'> <img src='css/image/categories/$value.svg' width='50px' height='50px' class='catalog-img'></div>
                                        <span class='catalog-title'>$key</span> 
                                        </a></li>" ;
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="cell small-12 medium-12 large-12 catalog">
            <div class="catalog-head content">
                <h3><p>Категорий</p></h3>
            </div>
            <div class="catalog-nav">
                <nav>
                <ul class="catalog-list">
                        <?php 
                            $categories = array(
                                                'Открытый мир' => 'openworlds',
                                                'Пост апокалипсис' => 'Post-apocalyptic',
                                                'Песочница' => 'Sandbox',
                                                'Хоррор' => 'openworlds',
                                                'Космос' => 'Space',
                                                'Стелс' => 'Stealth',
                                                'Рогалик' => 'Roque-like',
                                                'Тактика' => 'Tactical',
                                                'От первого лица' => 'First-Person',
                                                'Смешная' => 'Funny',
                                                'Головоломка' => 'Puzzle',
                                                'Строительство' => 'Building',
                                                'Атмосфера' => 'Atmosphere',
                                                'Аниме' => 'Anime',
                                                'Разрушаемость' => 'Destrunction',
                                                'Киберпанк' => 'Cyberpunk',
                                                'Средневековье' => 'Mediev',
                                                'Быстрая' => 'Fast-Paced',
                                                'Файтинг' => 'Fighting',
                                                'Магия' => 'Magic',
                                                'Пиксел. графика' => 'pixel-graphics',
                                                'Расслабляющая' => 'Relaxing',
                                                'Мясо' => 'Gore',
                                                'Исследование' => 'Exploration',
                                                'Зомби' => 'Zombie',
                                                'Выживание' => 'Survival',
                                            );

                            foreach($categories as $key => $value){
                                echo    "<li class='catalog-item'><a href='/$value' class='catalog-link'>
                                        <div class='catalog-icon'> <img src='css/image/categories/$value.svg' width='50px' height='50px' class='catalog-img'></div>
                                        <span class='catalog-title'>$key</span> 
                                        </a></li>" ;
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>

    </div>

    </div>
</main>

@endsection