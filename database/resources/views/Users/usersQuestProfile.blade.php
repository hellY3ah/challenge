@extends('layouts.dashboard')
@section('style')
    {!!HTML::style('css/User/userProfile.css', array(), true)!!}
    {!!HTML::style('css/UserGeneral/headerNav.css', array(), true)!!}
@stop
@section('content')

    <header>
        @include('Users.General.headerNav')
    </header>

    <main>
        <aside>
            <div class="avatar"></div>
            <p class="name">Имя: {{Auth::user()->name}}</p>
            <p class="name">Возраст: {{Auth::user()->age}}</p>
            <p class="name">Пол: {{Auth::user()->gender}}</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <button class="btn btn-link link"><a href="" onclick="clear('all'); openbox('idTQ'); return false">Текущий квест</a>
            </button>
            <button class="btn btn-link link"><a href="" onclick="openbox('idFQ'); return false">Грядущие квесты</a>
            </button>
            <button class="btn btn-link link"><a href="" onclick="openbox('idAQ'); return false">Архив</a>
            </button>
        </aside>

        <section class="section">

            <div id="section_inner">

            <div class="column all" id="idTQ">
                <div class="row">
                    <div class="text-center">Название</div>
                    <div class="text-center">Дата</div>
                    <div class="text-center">Время</div>
                    <div></div>
                </div>
                @foreach($quests as $key => $q)
                    @if($status[$key] == 1)
                        <div class="row quest">
                            <div class="text-center">{!! json_decode($q)->name !!}</div>
                            <div class="text-center">{!! json_decode($q)->date !!}</div>
                            <div class="text-center">{!! json_decode($q)->time !!}</div>
                            <div>
                                <button class="btn btn-link"><a href="" class="glyphicon glyphicon-th-list"
                                                                onclick="openbox('id'); return false"></a></button>
                            </div>
                        </div>
                        <div class="column task" id="id">
                            <div class="row">
                                <div class="text-center">Название</div>
                                <div class="text-center">Описание</div>
                                <div class="text-center">Длительность</div>
                                <div class="text-center">Вес</div>
                            </div>
                            @foreach(json_decode($tasks[$key]) as $k => $t)
                                <div class="row">
                                    <div class="text-center">{!! $t->name !!}</div>
                                    <div class="text-center">{!! $t->description !!}</div>
                                    <div class="text-center">{!! $t->duration !!}</div>
                                    <div class="text-center">{!! $t->weight !!}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>



            <div class="column all" id="idFQ">
                <div class="row">
                    <div class="text-center">Название</div>
                    <div class="text-center">Дата</div>
                    <div class="text-center">Время</div>
                    <div></div>
                </div>
                @foreach($quests as $key => $q)
                    @if($status[$key] == 0)
                        <div class="row quest">
                            <div class="text-center">{!! json_decode($q)->name !!}</div>
                            <div class="text-center">{!! json_decode($q)->date !!}</div>
                            <div class="text-center">{!! json_decode($q)->time !!}</div>
                            <div></div>
                        </div>
                    @endif
                @endforeach
            </div>



            <div class="column all" id="idAQ">
                <div class="row">
                    <div class="text-center">Название</div>
                    <div class="text-center">Дата</div>
                    <div class="text-center">Время</div>
                    <div></div>
                </div>
                @foreach($quests as $key => $q)
                    @if($status[$key] == 2)
                        <div class="row quest">
                            <div class="text-center">{!! json_decode($q)->name !!}</div>
                            <div class="text-center">{!! json_decode($q)->date !!}</div>
                            <div class="text-center">{!! json_decode($q)->time !!}</div>
                            <div>
                                <button class="btn btn-link"><a href="" class="glyphicon glyphicon-th-list"
                                                                onclick="openbox('id3'); return false"></a></button>
                            </div>
                        </div>
                        <div class="column task" id="id3">
                            <div class="row">
                                <div class="text-center">Название</div>
                                <div class="text-center">Описание</div>
                                <div class="text-center">Длительность</div>
                                <div class="text-center">Вес</div>
                            </div>
                            @foreach(json_decode($tasks[$key]) as $t)
                                <div class="row">
                                    <div class="text-center">{!! $t->name !!}</div>
                                    <div class="text-center">{!! $t->description !!}</div>
                                    <div class="text-center">{!! $t->duration !!}</div>
                                    <div class="text-center">{!! $t->weight !!}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>

            </div>
        </section>

    </main>

    <footer></footer>

    <script type="text/javascript">
        function openbox(id) {
               display = document.getElementById(id).style.display;
            if (display == 'none') {
               document.getElementById(id).style.display = 'block';
            } else {
              document.getElementById(id).style.display = 'none';
            }
        }
    </script>

@stop