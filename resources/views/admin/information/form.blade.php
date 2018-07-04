<div data-role="mainForm" style="display: none;" class="card-panel card new-data-form">
   <form data-role="realForm" action="/admin/table/create" enctype="multipart/form-data" method="POST">
      @csrf
      <input data-role="formId" type="hidden" name="id" value="0">
      <div class="card-content">
         <div class="row">
            <div class="input-field col s12">
               <input placeholder="Имя тега" data-role="formTag" name="tag_id" type="text" class="validate">
            </div>
            <div class="input-field col s12">
               <input data-role="formDescription" name="description" type="text" class="validate">
               <span class="helper-text">Подпись</span>
            </div>
            <div class="input-field col s12">
               <textarea data-role="formInformation" name="information" type="text"
               class="materialize-textarea validate"></textarea>
               <span class="helper-text">Текст</span>
            </div>
         </div>
         <div class="file-field col s12 input-field">
            <div class="btn">
               <span>Фото</span>
               <input data-role="formImage" type="file" name="image">
            </div>
            <div class="file-path-wrapper">
               <input class="file-path validate" type="text" placeholder="Загрузить"/>
            </div>
         </div>
      </div>
      <div class="input-field flex-center card-action">
         <input data-role="closeForm" type="submit" class="btn-flat" value="Сохранить">
      </div>
   </form>
   <a data-role="closeForm"
   class="btn-floating btn-large waves-effect btn-r-d-position waves-light red">
   <i class="material-icons">close</i>
</a>
</div>

<a data-role="openForm" class="btn-floating btn-large waves-effect btn-r-d-position waves-light red">
   <i class="material-icons">add</i>
</a>
