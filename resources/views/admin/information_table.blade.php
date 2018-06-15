<a class="btn-floating btn-large waves-effect open-add-data-form-ID btn-r-d-position waves-light red"><i
            class="material-icons">add</i></a>
<div class="container">
    <div class="row">
        @foreach ($information as $val)
            <div class="col xl4 l4 m6 s12">
                <div class="card card-panel one-card-main">
                    <div class="card-title center">
                        <div data-tag-id="{{e($val['id'])}}"><h5>{{e($val['id'])}}. {{e($val['tag_id'])}}</h5></div>
                    </div>
                    <div class="card-content scroll-y-a">
                        <div>{{e($val['information'])}}</div>
                    </div>
                    <div class="card-action">
                        <div class="form-action-inline">
                            <div>
                                <button type="submit" data-delete-id="{{e($val['id'])}}"
                                        class="btn deleteData-ID waves-effect waves-red">
                                    <i class="material-icons">delete</i>
                                </button>
                            </div>
                            <div>
                                <a data-form-id="{{e($val['id'])}}"
                                   class="btn openEditForm-ID waves-effect waves-light">Изменить</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="display: none" id="formto{{e($val['id'])}}" class="col form l6 form-show-ID m8 s12">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <div class="card-panel card">
                                <form action="/admin/table/update" enctype="multipart/form-data"
                                      method="POST">
                                    @csrf
                                    <div class="card-title">Изменение информации<i
                                                class="material-icons close-edit-form-ID pointer right">close</i>
                                    </div>
                                    <div class="card-content">
                                        <input type="text" name="id" hidden value="{{e($val['id'])}}">
                                        <div class="input-field">
                                            <input name="tag_id" type="text"
                                                   value="{{e($val['tag_id'])}}" class="validate">
                                        </div>
                                        <div class="input-field">
                                                <textarea name="information"
                                                          type="text"
                                                          class="materialize-textarea validate">{{e($val['information']) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="input-field card-action">
                                        <div class="photo-input">
                                            <input type="hidden" name="public" value="{{e($val['id'])}}">
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>Фото</span>
                                                    <input type="file" name="image">
                                                </div>

                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text"/>
                                                </div>
                                            </div>
                                            <button type="submit" name="save"
                                                    class="btn waves-effect waves-light">
                                                Сохранить
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div style="display: none;" class="card-panel card new-data-form new-data-form-ID">
    <form action="/admin/table/create" enctype="multipart/form-data" method="POST">
        @csrf
        {{ method_field('POST') }}
        <div class="card-content">
            <div class="input-field">
                <input id="tag_add" name="tag_id" type="text" class="validate">
                <label for="tag_add">Имя тега</label>
            </div>
            <div class="input-field">
            <textarea id="inf_add" name="information" type="text"
                      class="materialize-textarea validate"></textarea>
                <label for="inf_add">Текст</label>
            </div>
        </div>
        <div class="file-field input-field">
            <div class="btn">
                <span>Фото</span>
                <input type="file" class="file-add-path-ID" name="image">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload file"/>
            </div>
        </div>
        <div class="input-field flex-center card-action">
            <button type="submit" name="save" class="btn form-close-new-data-form-ID waves-effect waves-light">
                Сохранить
            </button>
        </div>
    </form>
    <a class="btn-floating btn-large waves-effect close-new-data-form-ID btn-r-d-position waves-light red"><i
                class="material-icons">close</i></a>
</div>


<script src="/js/form.js"></script>

<script>
    $(document).ready(function () {
        $('.deleteData-ID').click(function () {
            $(this).parent().parent().parent().parent().slideUp('slow');
            ajaxStart('/admin/table/delete', 'GET', 'id='+$(this).attr("data-delete-id"));
        });
        $('.openEditForm-ID').click(function () {
            var id = $(this).attr('data-form-id');
            $('#formto' + id).fadeIn();
        });

        $(".close-new-data-form-ID").click(function () {
            $(this).parent().fadeOut();
        });

        $(".open-add-data-form-ID").click(function () {
            $(".new-data-form-ID").fadeIn();
        });
        $(".form-close-new-data-form-ID").click(function () {
            $(this).parent().parent().parent().fadeOut();
        });

        $(".file-add-path-ID").change(function () {
            if ($(this).val() !== '') {
                $("#inf_add").attr("disabled", "on");
            }
        });

        $(".close-edit-form-ID").click(function () {
            $(this).parents(".form").fadeOut();
        });

    });
</script>