<div class="container">
   <div class="row">
      @if($not_use)
         <div class="col s12">
            <div class="card">
               <form data-role="ManagementUnusedDataTemplate">
                  @csrf
                  <div class="card-content">
                     <div class="card-title">
                        <div>Несуществующий текст</div>
                     </div>
                     @foreach($not_use as $not_uses)
                        <label class="chip">
                           <input name="{{$not_uses}}" value="true" type="checkbox" class="left"
                                  checked="checked"/>
                           <span>{{$not_uses}}</span>
                        </label>
                     @endforeach
                  </div>
                  <div class="card-action">
                     <a data-role="btnCreateUnused"
                        class="btn-flat black-text waves-effect waves-green">Создать</a>
                     <a data-role="btnEraseUnused" class="btn-flat black-text right waves-effect waves-red">Удалить</a>
                  </div>
               </form>
            </div>
         </div>
      @endif
      @if($use)
         <div class="col s12">
            <div class="card">
               <form data-role="ManagementUnusedDataBase">
                  @csrf
                  <div class="card-content">
                     <div class="card-title">
                        <div>Неиспользуемый текст</div>
                     </div>
                     @foreach($use as $uses)
                        <label class="chip">
                           <input name="{{$uses}}" value="true" type="checkbox" class="left" checked="checked"/>
                           <span>{{$uses}}</span>
                        </label>
                     @endforeach
                  </div>
                  <div class="card-action">
                     <a data-role="btnDeleteUnused"
                        class="btn-flat black-text waves-effect waves-green">Удалить</a>
                  </div>
               </form>
            </div>
         </div>
      @endif
   </div>
</div>
