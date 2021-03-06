@extends('layouts.dashboard')
@section('style')
    <link media="all" type="text/css" rel="stylesheet" href="/public/css/User/userViewQuests.css">
    <link media="all" type="text/css" rel="stylesheet" href="/public/css/UserGeneral/headerNav.css">
    <script type="text/javascript" src="/public/js/uilang.js"></script>
@stop
@section('content')

<header>
    @include('Users.General.headerQuestView')
</header>

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<main>
    <div class="container-fluid">
        <ul class="gallery-post-grid holder">

            <div class='row'>

                @foreach($quests as $key => $q)
                    @if(count($quests) == 1)
                        <div class='col-xs-12 col-sm-12 col-md-12 dQ'>
                            <li class='quest' data-id='id-<?= $key ?>' data-type='illustration'>
                        <span class='gallery-hover-3col hidden-phone hidden-tablet'>
                            <img src={{$q->avatar}} class="thum" alt="image">
                            <span class='gallery-icons'>
                                <a href='#' class='item-zoom-link lightbox' title='Просмотр' onclick='showDetails(this)'
                                   data-rel="{!! $q->name !!}" data-ava="{!! $q->avatar !!}"></a>
                                <a href='{{route('more', ['id'=>$q->id])}}' class='item-details-link '
                                   title='Играть'></a>
                            </span>
                        </span>
                                <span class='project-details'><a
                                            href='{{route('more', ['id'=>$q->id])}}'>{!! $q->name !!}</a>{!! $q->description !!}
                                    <br>{!! $q->date !!}</span>
                            </li>
                        </div>
                    @elseif(count($quests) < 3)
                        <div class='col-xs-12 col-sm-6 col-md-6 dQ'>
                            <li class='quest' data-id='id-<?= $key ?>' data-type='illustration'>
                        <span class='gallery-hover-3col hidden-phone hidden-tablet'>
                            <img src={{$q->avatar}} class="thum" alt="image">
                            <span class='gallery-icons'>
                                                             <a href='#' class='item-zoom-link lightbox'
                                                                title='Просмотр' onclick='showDetails(this)'
                                                                data-rel="{!! $q->name !!}" data-ava="{!! $q->avatar !!}"></a>
                                <a href='{{route('more', ['id'=>$q->id])}}' class='item-details-link'
                                   title='Играть'></a>
                            </span>
                        </span>
                                <span class='project-details'><a href='{{route('more', ['id'=>$q->id])}}'
                                                                 class="name">{!! $q->name !!}</a>{!! $q->description !!}
                                    <br>{!! $q->date !!}</span>
                            </li>
                        </div>
                    @else
                        <div class='col-xs-12 col-sm-6 col-md-4 dQ'>
                            <li class='quest' data-id='id-<?= $key ?>' data-type='illustration'>
                            <span class='gallery-hover-3col hidden-phone hidden-tablet'>
                                <img src={{$q->avatar}} class="thum" alt="image">
                            <a href='#' class='pp'>  </a>
                                <span class='gallery-icons'>

                                  <a href='#' class='item-zoom-link lightbox'
                                     title='Просмотр' onclick='showDetails(this)'
                                     data-rel="{!! $q->name !!}" data-ava="{!! $q->avatar !!}"></a>

                                    <a href='{{route('more', ['id'=>$q->id])}}' class='item-details-link'
                                       title='Играть'></a>
                                </span>
                            </span>
                                <span class='project-details'><a
                                            href='{{route('more', ['id'=>$q->id])}}'>{!! $q->name !!}</a>{!! $q->description !!}
                                    <br>{!! $q->date !!}</span>
                            </li>
                        </div>
                    @endif
                @endforeach

            </div>
            </ul>
        </div>
    </main>
    <footer>
        <div class="position">
            <div class="picture_center ">
                <div class="picture_center_center">
                    <img alt="" class="active_img">
                    <a href="#" class="glyphicon glyphicon-fullscreen" id="top_right_screen"></a>
                </div>
                <div class="bottom_desc">
                    <p class="questName"></p>
                    <a href="#" class=" glyphicon glyphicon-remove-sign" id="bottom_right_close"></a>
                </div>
            </div>
        </div>
        <div class="bg"></div>

        <script>
            // работает с data type в <a>
            function showDetails(quest) {
                var questType = quest.getAttribute("data-rel");
                $('.questName').html(questType);
                var avatar = quest.getAttribute("data-ava");
                $('.active_img').css('content', 'url('+ avatar +')');
            }
        </script>
        <code>
            clicking on ".item-zoom-link" adds class "open_bg" on ".bg"
            clicking on ".item-zoom-link" adds class "open_position" on ".position, .picture_center"
            clicking on "#bottom_right_close" removes class "open_bg" on ".bg"
            clicking on "#bottom_right_close" removes class "open_position" on ".picture_center, .position"
            clicking on "#bottom_right_close" removes class ".big_screen" on ".picture_center"
            clicking on "#bottom_right_close" removes class ".big_screen_inside" on ".picture_center_center"
            clicking on "#top_right_screen" toggle class "big_screen" on ".picture_center"
            clicking on "#top_right_screen" toggle class "big_screen_inside" on ".picture_center_center"
        </code>
    </footer>
@stop