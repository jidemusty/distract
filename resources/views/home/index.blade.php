@extends('app')

@section('content')
    <img src="img/loading.gif" v-if="loading" width="20" height="20" />

    <div class="item" v-for="item in items" v-else>
        <h3 class="item__title">
            <a :href="`${{ item.link }}`">@{{ item.title }}</a>
        </h3>
        <div class="item__service">
            @{{ item.service }}
        </div>
    </div>
@endsection