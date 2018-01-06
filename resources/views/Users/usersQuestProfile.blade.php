@extends('layouts.dashboard')
@section('style')
    {{HTML::style('css/User/userProfile.css')}}
    {{HTML::style('css/UserGeneral/headerNav.css')}}
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
            <button class="btn btn-link link"><a href="" onclick="openbox('idTQ'); return false">Текущий
                    квест</a>
            </button>
            <button class="btn btn-link link"><a href="" onclick="openbox('idFQ'); return false">Грядущие квесты</a>
            </button>
            <button class="btn btn-link link"><a href="" onclick="openbox('idLQ'); return false">Архив</a>
            </button>
        </aside>

        <section class="section">

            <div id="section_inner">

                <div class="column" id="idTQ">

                    <div class="row">
                        <div class="text-center">Название</div>
                        <div class="text-center">Дата</div>
                        <div class="text-center">Время</div>
                        <div class="text-center">Команда</div>
                        <div></div>
                    </div>
                    @foreach($questGeneral as $key => $q)
                        <div class="row quest">
                            <div class="text-center">{!! json_decode($q)->name !!}</div>
                            <div class="text-center">{!! json_decode($q)->date !!}</div>
                            <div class="text-center">{!! json_decode($q)->time !!}</div>
                            <div class="text-center">{!! $teamGeneral !!}</div>
                            <div>
                                <button class="btn btn-link"><a
                                            href="{{route('playQuest', ['idQuest'=> json_decode($q)->id])}}"
                                            class="glyphicon glyphicon-play"></a>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="column" id="idFQ">
                    <div class="row">
                        <div class="text-center">Название</div>
                        <div class="text-center">Дата</div>
                        <div class="text-center">Время</div>
                        <div class="text-center">Команда</div>
                        <div></div>
                    </div>
                    @foreach($questFuture as $key => $q)
                        <div class="row quest">
                            <div class="text-center">{!! json_decode($q)->name !!}</div>
                            <div class="text-center">{!! json_decode($q)->date !!}</div>
                            <div class="text-center">{!! json_decode($q)->time !!}</div>
                            <div class="text-center">{!! $teamFuture[$key] !!}</div>
                            <div>
                                <button class="btn btn-link"><a
                                            href="{{route('editTeam', ['id'=>json_decode($q)->id])}}"
                                            class="glyphicon glyphicon-pencil"></a>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="column" id="idLQ">
                    <div class="row">
                        <div class="text-center">Название</div>
                        <div class="text-center">Дата</div>
                        <div class="text-center">Время</div>
                        <div class="text-center">Команда</div>
                        <div class="text-center">Результат</div>
                        <div></div>
                    </div>
                    @foreach($questLast as $key => $q)
                        <div class="row quest">
                            <div class="text-center">{!! json_decode($q)->name !!}</div>
                            <div class="text-center">{!! json_decode($q)->date !!}</div>
                            <div class="text-center">{!! json_decode($q)->time !!}</div>
                            <div class="text-center">{!! $teamLast[$key] !!}</div>
                            <div class="text-center">{!! $result[$key] !!}</div>
                            <div>
                                <button class="btn btn-link"><a href="" class="glyphicon glyphicon-th-list"
                                                                onclick="openboxt('id{{$key}}'); return false"></a>
                                </button>
                                <button class="btn btn-link"><a href="#" class="glyphicon glyphicon-map-marker"></a>
                                </button>
                            </div>
                        </div>

                        <div class="column task" id="id{{$key}}">
                            <div class="row">
                                <div class="text-center">Название</div>
                                <div class="text-center">Описание</div>
                                <div class="text-center">Очки</div>
                                <div class="text-center">Выполнение</div>

                            </div>
                            @foreach($tasksLast as $kk => $task)
                                @if($kk == $key)
                                    @foreach(json_decode($task) as $k => $t)

                                        <div class="row">
                                            <div class="text-center">{!! $t->name !!}</div>
                                            <div class="text-center">{!! $t->description !!}</div>
                                            <div class="text-center">{!! $t->weight*100 !!}</div>
                                            @if($executeTask[$k])
                                                <div><input type="checkbox" checked disabled></div>
                                            @else
                                                <div><input type="checkbox" disabled></div>
                                            @endif
                                        </div>
                                    @endforeach

                                @endif
                            @endforeach

                        </div>

                    @endforeach

                </div>


            </div> <!-- div section inner-->
        </section>

    </main>

    <footer></footer>

    <script type="text/javascript">
        function openbox(id) {
            if (id == 'idTQ') {
                document.getElementById('idTQ').style.display = 'block';
                document.getElementById('idLQ').style.display = 'none';
                document.getElementById('idFQ').style.display = 'none';
            } else if (id == 'idLQ') {
                document.getElementById('idLQ').style.display = 'block';
                document.getElementById('idTQ').style.display = 'none';
                document.getElementById('idFQ').style.display = 'none';
            } else if (id == 'idFQ') {
                document.getElementById('idFQ').style.display = 'block';
                document.getElementById('idTQ').style.display = 'none';
                document.getElementById('idLQ').style.display = 'none';
            }
        }

        function openboxt(id) {
            display = document.getElementById(id).style.display;
            if (display == 'none') {
                document.getElementById(id).style.display = 'block';
            } else {
                document.getElementById(id).style.display = 'none';
            }
        }

    </script>

@stop