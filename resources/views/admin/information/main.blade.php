
@include('admin.information.manage')

<div class="container">
   <div class="row">
      @foreach ($information as $val)
         <div class="col s12">
            <div class="card one-card-main" data-role="card" data-id="{{$val['id']}}">
               <div class="card-content scroll-y-a">
                  <div class="card-title">
                     <h5>
                        <span data-role="cardDescription">{{$val['description']}}</span>
                        (<span data-role="cardTag">{{$val['tag_id']}}</span>)
                     </h5>
                  </div>
                  <div>
                     <span data-role="cardInformation">{{$val['information']}}</span>
                  </div>
               </div>
               <div class="card-action">
                  <div class="form-action-inline">
                     <div>
                        <a data-form-id="{{$val['id']}}" data-role="openEditForm"
                           class="btn-flat black-text waves-effect waves-teal">Изменить</a>
                     </div>
                     <div>
                        @if($val['image'])
                           <a href="#modal{{$val['id']}}"
                              class="waves-effect btn-floating modal-trigger">
                              <i class="material-icons">visibility</i>
                           </a>
                        @endif
                        <a data-role="deleteInformation" class="btn-floating btn-m-l waves-effect waves-red">
                           <i class="material-icons">delete</i>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @if($val['image'])
            <div id="modal{{$val['id']}}" class="modal">
               <div class="modal-content flex-center">
                  <img src="{{$val['information']}}" alt="" class="responsive-img">
               </div>
               <div class="modal-footer">
                  <a class="modal-close waves-effect waves-green btn-flat">Закрыть</a>
               </div>
            </div>
         @endif
      @endforeach
   </div>
</div>

@include('admin.information.form')

<script src="/js/form.js"></script>

<script src="/js/information.js"></script>
