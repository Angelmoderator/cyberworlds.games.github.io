@extends('blocks.layout')

@section('title')  Error @endsection

@section('main_content')

<head><link rel="stylesheet" href="css/pages/error.css"></head>

<main class="cell parent">
    
    <div class="main cell">

        <style>main{background-color: black;}</style>

        <div class="grid-x grid-margin-x error">

                

                <div class="cell small-12 medium-12 large-12 error-name">Форма для обратной связи</div>

                <div class="cell small-12 medium-12 large-3 error-attention"> 
                    <img src="/image/icons/error.svg" alt=""> 
                    <h1 class="cell small-12 large-12 error-title">Заметили ошибку!</h1>
                </div>

                <div class="cell small-12 medium-1 large-1 error-hole"></div>
                <form action="{{route('contact-form')}}" method="post" class="cell small-12 medium-12 large-8 black" style="padding: 10px">

                    

                   

                    <h1 class="cell small-12 large-12 error-title">Подробное описание ошибки!</h1>

                    @if($errors->any())
                        <div class="alert alert-danger cell small-12 medium-12 large-12">
                            <div>Ошибка!</div>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @csrf
                    

                    <div class="placeholder-container">
                        <input type="text"      id="username" name="username" placeholder=" " />
                        <label>Тема ошибки</label>
                    </div>

                    <div class="placeholder-container">
                        <textarea type="text"   id="error-event" name="error-event"  cols="30" rows="3"  placeholder="Обстоятельства при которых появилась ошибка" class="form-control"></textarea>
                    </div>

                    <div class="placeholder-container">
                        <textarea type="text"   id="error-text" name="error-text"  cols="30" rows="8"  placeholder="Код ошибки или текст ошибки" class="form-control"></textarea>
                    </div>

                    {{-- <div class="form-group">
                        <label for="theme">Тема сообщения</label>
                        <input type="text" name="theme" placeholder="Тема сообщения" id=theme class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message">Сообщение</label>
                        <textarea name="message" id="message" cols="30" rows="6" class="form-control"></textarea>
                    </div> --}}

                    

                    <div class="formname">
                        <input id="checkbox" type="checkbox" name="checkbox" onchange="document.getElementById('submit').disabled = !this.checked;" />
                        <label for="checkbox">Настоящим подтверждаю, что я согласен</label>    
                        <input type="submit" disabled="disabled" name="submit" id="submit" value="Отправить" class="button primary" />
                    </div>

                    
                </form>

        </div>
    </div>
</main>

@endsection