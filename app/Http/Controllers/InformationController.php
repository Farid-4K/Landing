<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{

   public function __construct()
   {
      $this->middleware('auth');
   }

   public function create(Request $request)
   {

      $validated = $request->validate([
        'tag_id'      => 'required|unique:information|regex:/^([\w]+[^0-9])/|max:100',
        'information' => 'max:1000',
        'image'       => 'image',
      ]);

      if ($request->hasFile('image')) {
         $information = Information::checkUploadData($validated['image']);
      } else {
         $information = $validated['information'];
      }
      $row = new Information();
      $v = $request;
      if ($row->fill([
        'tag_id'      => $validated['tag_id'],
        'information' => $information ?: 'default',
      ])
      ) {
         if ($row->save()) {
            return response('Загружено');
         };
      } else {
         return response('ERROR', 500);
      }
   }

   public function update(Request $request)
   {
      $id = $request->get('id');

      $validated = $request->validate([
        'id'          => 'required',
        'tag_id'      => 'required|regex:/^([\w]+[^0-9])/|max:100',
        'information' => 'max:1000',
        'image'       => 'image',
      ]);

      if ($request->hasFile('image')) {
         $information = Information::checkUploadData($validated['image']);
      } else {
         $information = $validated['information'];
      }
      $row = Information::query()->find($id);
      if ($row->fill([
        'tag_id'      => $validated['tag_id'],
        'information' => $information,
      ])
      ) {
         if ($row->save()) {
            return response('Загружено');
         };
      } else {
         return response('ERROR', 500);
      }
   }


   public function delete(Request $request)
   {
      if ($request->filled('id')) {
         $id = $request->get('id');
         if (Information::trash($id)) {
            return response('Блок удален номер - ' . $id);
         } else {
            return response('Ошибка', 500);
         }
      }
   }

   public function table(Request $request)
   {
      if ($request->get('page') == 'information') {

         $db = json_decode(Information::all());

         $data = [
           'information' => array_map(
             function ($s) {
                return [
                  'id'          => $s->id,
                  'tag_id'      => $s->tag_id,
                  'information' => $s->information,
                ];
             },
             $db),
         ];

         return view('admin.information_table', $data);
      }
   }
}
