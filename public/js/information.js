jQuery(function () {

   function inputClear(selector) {
      selector.val("").attr("value", "");
   }

   let delay = 100;

   let action = {
      unused: {
         create: '/admin/table/create/unused',
         delete: '/admin/table/delete/unused',
         erase: '/admin/table/erase/unused',
      }
   };


   /* Query settings */
   let btn = {
      card: {
         delete: '[data-role=deleteInformation]',
         edit: '[data-role=openEditForm]'
      },
      form: {
         close: '[data-role=closeForm]',
         open: '[data-role=openForm]'
      },
      unused: {
         create: 'a[data-role=btnCreateUnused]',
         delete: 'a[data-role=btnDeleteUnused]',
         erase: 'a[data-role=btnEraseUnused]'
      },
   };


   /* Query settings */
   let form = {
      self: '[data-role=realForm]',
      parent: '[data-role=mainForm]',
      data: {
         id: '[data-role=formId]',
         tag: '[data-role=formTag]',
         des: '[data-role=formDescription]',
         inf: '[data-role=formInformation]',
         img: '[data-role=formImage]'
      },
   };


   /* Query settings */
   let card = {
      self: '[data-role=card]',
      data: {
         des: '[data-role=cardDescription]',
         tag: '[data-role=cardTag]',
         inf: '[data-role=cardInformation]'
      },
   };

   let manage = {
      database: '[data-role=ManagementUnusedDataBase]',
      template: '[data-role=ManagementUnusedDataTemplate]',
   };

   /* Создание информации */
   $(form.self).submit(function (event) {
      event.preventDefault();
      ajaxStart($(form.self).attr("action"), 'POST', new FormData(this));
      return false;
   });

   /* Удаление карточки */
   $(btn.card.delete).click(function () {
      let parent = $(this).parents(card.self);
      parent.slideUp();
      ajaxStart('/admin/table/delete', 'GET', 'id=' + parent.attr("data-id"));
      return true;
   });

   /* Закрытие формы */
   $(btn.form.close).click(function () {
      $(this).parents(form.parent).fadeOut(150);
      return true;
   });

   /* Открытие формы */
   $(btn.form.open).click(function () {
      $(form.data.tag).show(0);
      inputClear($(form.data.tag));
      inputClear($(form.data.des));
      inputClear($(form.data.inf));
      inputClear($(form.data.img));
      inputClear($(form.data.id));
      M.textareaAutoResize($(form.data.inf));
      $(form.parent).fadeIn(150);
      return true;
   });

   /* отключение поля - информация */
   $(form.data.img).change(function () {
      if (Boolean($(this).empty())) {
         $(form.data.inf).attr("disabled", "on");
      } else {
         $(form.data.inf).removeAttr("disabled");
      }
      return true;
   });

   $('.modal').modal();

   /* Удаление из шаблона */
   $(btn.unused.erase).click(function () {
      ajaxStart(action.unused.erase, 'GET', $(this).parents(manage.template).serialize());
      return false;
   });

   /* Создание из шаблона */
   $(btn.unused.create).click(function () {
      ajaxStart(action.unused.create, 'GET', $(this).parents(manage.template).serialize());
      return false;
   });

   /* Удаление из базы */
   $(btn.unused.delete).click(function () {
      ajaxStart(action.unused.delete, 'GET', $(this).parents(manage.database).serialize());
      return false;
   });

   /* Открытие редактирования */
   $(btn.card.edit).click(function () {
      let parent = $(this).parents(card.self);
      let data = [];

      data.id = parent.attr("data-id");
      data.information = parent.find(card.data.inf).text();
      data.description = parent.find(card.data.des).text();
      data.tag = parent.find(card.data.tag).text();

      $(form.data.tag).val(data.tag).attr("value", data.tag).hide(0);
      $(form.data.des).val(data.description).attr("value", data.description);
      $(form.data.inf).val(data.information).attr("value", data.information);
      $(form.data.id).val(data.id).attr("value", data.id);
      $(form.parent).fadeIn(150);
   });

   function showEditForm() {
      let parent = $(this);
      let data = {
         id: parent.attr("data-id"),
         information: parent.find(card.data.inf).text(),
         description: parent.find(card.data.des).text(),
         tag: parent.find(card.data.tag).text()
      };
      $(form.data.tag).val(data.tag).attr("value", data.tag).hide(0);
      $(form.data.des).val(data.description).attr("value", data.description);
      $(form.data.inf).val(data.information).attr("value", data.information);
      $(form.data.id).val(data.id).attr("value", data.id);
      $(form.parent).fadeIn(150);
   }
});