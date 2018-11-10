@extends('app')

@section('content')
    <div class="item" v-for="item in items">
        <h3 class="item__title">
            <a :href="`${ item.link }}`">@{{ item.title }}</a>
        </h3>
        <div class="item__service">
            @{{ item.service }}
        </div>
    </div>

    <div class="loading">
        One moment
    </div>
@endsection