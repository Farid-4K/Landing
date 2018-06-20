<div class="container">
    <div class="card-panel card">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s4"><a class="active" href="#test1">О себе</a></li>
                    <li class="tab col s4"><a href="#test2">Настройки</a></li>
                    <li class="tab col s4"><a href="#test3">Опасная зона</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="test1" class="col s12">
            <div class="row">
                <div class="card card-panel">
                    <div class="card-title">Настройки</div>
                    <form method="POST" action="/admin/settings/set">
                        <div class="card-content">
                            @csrf
                            <div class="input-field">
                                <input name="name" id="name" type="text" class="" value="{{$name}}">
                                <label class="active" for="name">Имя</label>
                            </div>
                            <div class="input-field">
                                <input name="email" id="email" type="text" class="" value="{{$email}}">
                                <label class="active" for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input name="login" id="login" type="text" class="" value="{{$login}}">
                                <label class="active" for="login">Логин</label>
                            </div>
                            <a href="#modal"
                               class="waves-effect waves-light btn modal-trigger"
                               data-position="right">
                                <span>Изменить пароль</span>
                            </a>
                        </div>
                        <div class="card-action">
                            <button class="btn waves-effect waves-light">Сохранить</button>
                            @if($vk == '0')
                                <a href="/login/vk" class="btn waves-effect right waves-light">Привязать ВК</a>
                            @elseif ($vk != '0')
                                <a href="/admin/settings/untie" id="vk_logout"
                                   class="btn right waves-effect waves-light">Отвязать ВК</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form method="POST" action="/admin/settings/setPassword">
            <div id="modal" class="modal card-panel" style="width: 350px;">
                <div class="modal-content flex-center">
                    @csrf
                    <div class="input-field">
                        <input name="password" id="password" type="password" class="">
                        <label for="password">Новый пароль</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn waves-effect left waves-light">Сохранить</button>
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Закрыть</a>
                </div>
            </div>
        </form>
        <div id="test2" class="col s12">
            <div class="row">
                <div class="card-panel">

                </div>
            </div>
        </div>
        <div id="test3" class="col s12">
            <div class="row">
                <div class="card card-panel">
                    Сайт <span class="green-text">включен</span>
                </div>
                <div class="card card-panel">
                    <button class="btn-flat waves-effect waves-red">
                        Удалить все данные о покупателях
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/js/form.js"></script>
<script>
    $(document).ready(function () {
        $('.tabs').tabs();
        $("#test1 input").change(function () {
            ajaxStart('/admin/settings/set', 'get', $(this).attr("id") + '=' + $(this).val());
        });
        $('.tooltipped').tooltip({enterDelay: 1000});
        $(document).ready(function () {
            $('.modal').modal();
        });
    });
</script>