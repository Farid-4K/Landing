<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Information;
use App\Http\Controllers\Controller;
use App\Landing\BladeEditor;
use Illuminate\Http\Request;

class InformationController extends Controller
{
   protected $information;

   public function __construct(Request $request, Information $information)
   {
      $this->middleware('auth');
      $this->information = $information;
   }

   public function check(Request $request)
   {
      return $request->filled('id') ? true : false;
   }

   public function validating(Request $request, Bool $variant)
   {
      $validated = $request->validate(
        [
          'tag_id'      => $variant
            ? 'required|string|regex:/^([\w]+[^0-9])/|max:100'
            : 'required|string|regex:/^([\w]+[^0-9])/|max:100|unique:information',
          'information' => 'required|max:60000',
          'image'       => 'image',
          'description' => 'required|max:100',
        ]);

      return $validated;
   }

   public function createOrUpdate(Request $request)
   {
      $validated = $this->validating($request, $this->check($request));

      if($request->hasFile('image')) {
         $validated['information'] = $this->information::uploadImage($validated['image']);
      }

      return $this->information::query()
                        ->updateOrCreate(
                          ['tag_id' => $validated['tag_id']],
                          $validated)
        ? response('Загружено', 200)
        : response('Ошибка', 500);
   }

   public function CreateMissingFields(Request $request)
   {
      foreach ($request->all() as $key => $val) {
         if($val === 'true') {
            $this->information::query()->create(
              [
                'tag_id'      => $key,
                'information' => 'Текст',
                'description' => 'Заголовок',
              ]);
         };
      }

      return response('Создано', 200);
   }

   /**
    * Delete information
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
    */
   public function delete(Request $request)
   {
      if($request->filled('id')) {
         $id = $request->get('id');

         return $this->information->trash($id)
           ? response('Блок удален - ' . $id, 200)
           : response('Ошибка', 500);
      }

      return response('Ошибка', 400);
   }

   /**
    * Delete unused variables from database
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
    */
   public function deleteUnusedFields(Request $request)
   {
      foreach ($request->all() as $key => $val) {
         if($val === 'true') {
            $this->information::query()->where('tag_id', '=', $key)->delete();
         };
      }

      return response('Удалено');
   }

   /**
    * Erase unused variables in template
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
    */
   public function EraseExtraVariables(Request $request)
   {
      $template = new BladeEditor("landing");
      if($request->has('_token')) {
         foreach ($request->all() as $key => $val) {
            if($val === 'true') {
               $template->replaceBladeEcho($key, '');
            }
         }
      }

      return $template->save()
        ? response('Удалено')
        : response('Ошибка');
   }

   /**
    * Preview template after edit
    *
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
   public function preview()
   {
      /**
       * Analogy of the method from HomeController but have middleware auth
       */
      foreach ($this->information::all() as $db) {
         $data[$db->tag_id] = $db->information;
      }

      return view('admin.preview', $data??null);
   }

   /**
    * Show table with all Information
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
   public function table(Request $request)
   {
      /**
       * Format and show information
       */
      $db = json_decode($this->information::all());

      $parse = new BladeEditor("landing");
      $variables = $parse->parseBladeEchos(true);

      foreach ($db as $key => $columns) {
         $tags[$key] = $columns->tag_id;
      }

      $data = [
        'information' => array_map(
          function ($s) {
             return [
               'id'          => $s->id,
               'tag_id'      => $s->tag_id,
               'information' => $s->information,
               'description' => $s->description,
               'image'       => preg_match(
                 '/(\/image\/)/',
                 $s->information)
                 ? true : false,
             ];
          },
          $db),
        'use'         => array_diff($tags, $variables),
        'not_use'     => array_diff($variables, $tags),
      ];

      return view('admin.information.main', $data);
   }
}
