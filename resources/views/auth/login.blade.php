@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="/css/admin/style.css">
    <title>Вход</title>
@endsection

@section('content')
    <div class="form-page">
        <div class="container">
            <div class="row">
                <div class="col l6 offset-l3 xl4 offset-xl4 m8 s12 offset-m2">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div id="form" style="width: 100%" class="card-panel">
                            <div class="input-field">
                                <input id="login" name="login" type="text" class="validate">
                                <label class="active" for="login">LOGIN</label>
                            </div>
                            <div class="input-field">
                                <input id="password" name="password" type="password" class="validate">
                                <label class="active" for="password">PASSWORD</label>
                            </div>
                            <div class="input-field">
                                <button class="btn waves-effect waves-light">Вход</button>
                                @if ($vk !== 0)
                                <a href="/login/vk" class="btn waves-effect waves-light blue">VK</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
