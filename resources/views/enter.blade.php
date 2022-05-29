@extends('blocks.layout')

@section('title') Вход/Регистрация @endsection


@section('main_content')

<head>    <link rel="stylesheet" href="/css/pages/enter.css"></head>


<main class="cell parent">

    <div class="main cell">


        <div class="form_enter">

            <div class="cover">
                <div class="message">
                    <h2>CyberWorlds_Games</h2>
                    <h1>Здесь каждый найдёт для себя игру подешевле</h1>
                    <p>Исследуете и открываете для себя искусство компьютерных игр. </p>
                </div>
            </div>

            <form action="" method="post" class="form">

            <div class="preview">
                <h1>Логин</h1>
                <p>Присоединится к CyberWorlds_Games</p>
            </div>
                  
            <div class="data">
                <div class="placeholder-container">
                    <input type="text"      id="username" name="username" placeholder=" " />
                    <label>Логин</label>
                </div>
                <div class="placeholder-container">
                    <input type="password"  id="password" name="password" placeholder=" " />
                    <label>Пароль</label>
                </div>   
                <a href="">Забыли ваш пароль?</a>
            </div>     


            <div class="formname">
                <input id="checkbox" type="checkbox" name="checkbox" onchange="document.getElementById('submit').disabled = !this.checked;" />
                <label for="checkbox">Настоящим подтверждаю, что я согласен</label>    
                <input type="submit" disabled="disabled" name="submit" id="submit" value="Войти" class="button primary Log_In" />
            </div>
            {{-- <div class="button primary Log_In"><button type="submit">Войти</button></div> --}}
            <a href="">Еще нет аккунта?</a>
            <p>Нажав Войти, я подтверждаю, что прочитал и согласен с Условиями предоставления услуг CyberWorlds_Games, <a href="http://cyberworlds.games/privacy_policy"> политикой конфиденциальности</a>, а также получать электронные письма и обновления.</p>
            </form>

        </div>

    </div>
</main>

@endsection