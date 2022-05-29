@extends('blocks.layout')

@section('title')  О сайте @endsection

@section('main_content')

<head><link rel="stylesheet" href="/css/about.css"></head>

<main class="cell parent">
    <div class="main cell">
                

        <div style="position:relative;"></div>
        
        <div class="bgimg-1">
            <div class="caption">
                <span class="border">О САЙТЕ</span>
            </div>
        </div>
       
        <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
            <h3 style="text-align:center;color:black;">CyberWorld_Games — это реальная экономия при покупке лицензионных игр в Steam</h3>
            <p style="text-align:center;color:black;">CyberWorlds_Games – это сервис поиска лучших цен на игры. Мы предоставляем нашим пользователям качественный и удобный каталог игр. 
                О каждом товаре собрана подробная информация: скриншоты, трейлеры, разработчики, платформы, цены в разных магазинах, а также график изменения цен.</p>
              
        </div>
        <div class="bgimg-2">
            <div class="caption">
                <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">Особенности</span>
            </div>
        </div>
        <div style="position:relative;">
            <div style="color:white;background-color:#282E34;text-align:center;padding:10px 80px;text-align: justify;">
                <p>
                    <ul class="features">
                        <li>
                            <div class="icon"><img src="/image/about/discount.svg" height="130px" width="130px"alt=""></div>
                            <div class="content">
                                <span>Скидки в Steam</span>
                                <p>Мы проверяем ежедневные и сезонные акции в Стиме и пишем о самых больших скидках и вкусных ценах.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><img src="/image/about/top_discount.svg" height="130px" width="130px"alt=""></div>
                            <div class="content">
                                <span>Поиск лучших цен</span>
                                <p>Получите скидку более чем 50% на популярные игры, покупая код активации Steam в сторонних интернет-магазинах.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><img src="/image/about/security.svg"  height="130px" width="130px" alt=""></div>
                            <div class="content">
                                <span>Безопасность</span>
                                <p>Только проверенные официальные дилеры и дистрибьюторы с гарантиями и зарегистрированными юридическими лицами</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><img src="/image/about/support.svg"  height="130px" width="130px" alt=""></div>
                            <div class="content">
                                <span>Служба поддержки</span>
                                <p>Которая всегда готова помочь и ответить на возникшие вопросы</p>
                            </div>
                        </li>


                        
                        
                    </ul>
                </p>
            </div>
        </div>
      
        <div class="bgimg-3">
            <div class="caption">
                <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">О магазинах</span>
            </div>
        </div>
        <div style="position:relative;">
            <div style="color:white;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
                <p>
                    <br />
                       Все магазины, представленные в каталоге, прошли проверку (осуществлялись тестовые покупки, изучалась информация и гарантии). Это одни из самых популярных дилеров игр, где продаются официальные товары.
                    <br />
                </p>
                <p>Hot Game не является посредником в покупке, это лишь каталог, удобный способ найти самое выгодное предложение. Покупка осуществляется на сайте магазина. Всегда будьте внимательны и уточняйте условия покупки, цену и комплектацию у выбранного вами продавца. Если вы не уверены в каком-то конкретном интернет-магазине, вы можете прочесть о нем подробнее по ссылке ниже.</p>
            </div>
        </div>
        <div class="bgimg-5">
            <div class="caption">
                <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">КАК РАБОТАЕТ ПОИСК</span>
            </div>
        </div>
        <div style="position:relative;">
            <div style="color:white;background-color:black;text-align:center;padding:50px 80px;text-align: justify;">
                <p>
                    <ol class="quastion-search">
                        <li>
                           <span>Сравнение цен</span>
                            <div class="quastion-content">
                                <span>1</span>
                                <p>Наш поисковый сервер автоматически проверяет цены в самых выгодных интернет-магазинах игр в рунете и сравнивает их. 
                                    Данный поиск поможет вам получить реальную экономию при покупке лицензионных игр за счет того, что вы сможете купить игру в магазине, предоставившем максимальную скидку.</p>
                            </div>
                        </li>
                        <li>
                            <span>Честные цены</span>
                            <div class="quastion-content">
                                <span>2</span>
                                <p>Вы увидите честные цены без «накруток», а при нажатии на кнопку «Купить», перейдете в магазин, где сможете совершить покупку. 
                                    После оплаты ключа Вы получите лицензионный код, который нужно активировать в библиотеке Steam либо другой игровой платформы.</p>
                            </div>
                        </li>
                        <li>
                            <span>Выгодная цена</span>
                            <div class="quastion-content">
                                <span>3</span>
                               
                                <p>Вы можете подписаться на игру, тогда мы пришлем вам электронное письмо, как только найдем более выгодную цену. 
                                    Чтобы создать подписку, нажмите кнопку «Подписаться» около исходного предложения игры от Steam (если оно есть). От подписки можно легко отказаться.
                                </p>
                            </div>
                        </li>


                        
                        
                    </ol>
                </p>
            </div>
        </div>
        <div class="bgimg-4">
            <div class="caption">
                <span class="border">CyberWorlds_Games</span>
            </div>
        </div>










        

    </div>
</main>

@endsection