<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Parser;

class InformationController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function create(Request $request)
   {
      /**
       * Validation
       */
      $validated = $request->validate(
        [
          'tag_id'      => 'required|unique:information|regex:/^([\w]+[^0-9])/|max:100',
          'information' => 'max:1000',
          'image'       => 'image',
          'description' => 'max:100',
        ]);

      /**
       * Check image upload
       */
      if($request->hasFile('image')) {
         $information = Information::checkUploadData($validated['image']);
      } else {
         $information = $validated['information'];
      }

      /**
       * Add to database
       */
      $row = new Information();
      if($row->fill(
        [
          'tag_id'      => $validated['tag_id'],
          'information' => $information ?: 'default',
          'description' => $validated['description'] ?: 'default',
        ])
      ) {
         return $row->save()
           ? response('Загружено')
           : response('error', 500);
      }
   }

   public function update(Request $request)
   {
      /**
       * Validation
       */
      $validated = $request->validate(
        [
          'id'          => 'required',
          'description' => 'max:100|required',
          'information' => 'max:1000',
          'image'       => 'image',
        ]);

      /**
       * Check image upload
       */
      if($request->hasFile('image')) {
         $information = Information::checkUploadData($validated['image']);
      } else {
         $information = $validated['information'];
      }

      /**
       * Find row and add to database
       */
      $id = $request->get('id');
      $row = Information::query()->find($id);
      if($row->fill(
        [
          'description' => $validated['description'],
          'information' => $information,
        ])
      ) {
         return $row->save()
           ? response('Загружено')
           : response('ERROR', 500);
      }
   }

   public function delete(Request $request)
   {
      if($request->filled('id')) {
         $id = $request->get('id');
         return Information::trash($id)
           ? response('Блок удален номер - ' . $id)
           : response('Ошибка', 500);
      }
   }

   public function table(Request $request)
   {
      /**
       * Format and show information
       */
      if($request->get('page') == 'information') {
         $db = json_decode(Information::all());

         $parse = new Parser;
         $variables = $parse->parseBladeEchos('welcome.blade.php');
         foreach ($db as $key => $columns) {
            $tags[$key] = sprintf('$%s', $columns->tag_id);
         }

         $data = [
           'information' => array_map(
             function ($s) {
                return [
                  'id'          => $s->id,
                  'tag_id'      => $s->tag_id,
                  'information' => $s->information,
                  'description' => $s->description,
                  'image'       => preg_match('/(\/image\/)/', $s->information)
                    ? true : false,
                ];
             },
             $db),
           'use'=> array_diff($tags, $variables),
           'not_use' => array_diff($variables, $tags),

         ];

         return view('admin.information_table', $data);
      }
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
}
