<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Information;
use App\Http\Controllers\Controller;
use App\Landing\BladeEditor;
use Illuminate\Http\Request;

class InformationController extends Controller
{
   public function __construct(Request $request)
   {
      $this->middleware('auth');
   }

   public function create(Request $request)
   {
      if ($request->filled('id')) {
         $row = Information::query()->find($request->get('id'));
         $unique = null;
      } else {
         $row = new Information();
         $unique = '|unique:information';
      }

      /**
       * Validation
       */
      $validated = $request->validate(
         [
            'tag_id'      => 'required|regex:/^([\w]+[^0-9])/|max:100' . $unique,
            'information' => 'max:1000',
            'image'       => 'image',
            'description' => 'max:100',
         ]);

      /**
       * Check image upload
       */
      if ($request->hasFile('image')) {
         $information = Information::uploadImage($validated['image']);
      } else {
         $information = $validated['information'];
      }

      /**
       * Add to database or update
       */
      if ($row->fill(
         [
            'tag_id'      => $validated['tag_id'],
            'information' => $information ?: 'default',
            'description' => $validated['description'] ?: 'default',
         ])
      ) {
         return $row->save()
            ? response('Загружено', 200)
            : response('Ошибка', 500);
      }
   }

   public function createUnused(Request $request)
   {
      if ($request->has('_token')) {
         foreach ($request->all() as $key => $val) {
            if ($val === 'true') {
               $db = new Information;
               $db->tag_id = $key;
               $db->information = 'Стандартный текст';
               $db->description = 'Заголовок';
               $db->save();
            };
         }
      }

      return response('Создано');
   }

   public function delete(Request $request)
   {
      if ($request->filled('id')) {
         $id = $request->get('id');

         return Information::trash($id)
            ? response('Блок удален номер - ' . $id)
            : response('Ошибка', 500);
      }
   }

   public function deleteUnused(Request $request)
   {
      if ($request->has('_token')) {
         foreach ($request->all() as $key => $val) {
            if ($val === 'true') {
               Information::query()->where('tag_id', '=', $key)->delete();
            };
         }
      }
      return response('Удалено');
   }

   public function eraseUnused(Request $request)
   {
      $template = new BladeEditor("landing");
      if ($request->has('_token')) {
         foreach ($request->all() as $key => $val) {
            if ($val === 'true') {
               $template->replaceBladeEcho($key, '');
            }
         }
      }

      return $template->save()
         ? response('Удалено')
         : response('Ошибка');
   }

   public function preview()
   {
      /**
       * Analogy of the method from HomeController but have middleware auth
       */
      $flights = Information::all();

      $data = [];

      foreach ($flights as $flight) {
         $data[$flight->tag_id] = $flight->information;
      }

      return view('admin.preview', $data);
   }

   public function table(Request $request)
   {
      /**
       * Format and show information
       */
      if ($request->get('page') == 'information') {
         $db = json_decode(Information::all());

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
                     'image'       => preg_match('/(\/image\/)/',
                        $s->information)
                        ? true : false,
                  ];
               },
               $db),
            'use'         => array_diff($tags, $variables),
            'not_use'     => array_diff($variables, $tags),

         ];

         return view('admin.information_table', $data);
      }
   }
}
