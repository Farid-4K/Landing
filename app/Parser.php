<?php

namespace App;

class Parser
{
   public function loadTemplate($path)
   {
      $template = file_get_contents(
        resource_path() . "/views/{$path}");
      return $template;
   }

   public function parseBladeEchos($path)
   {
      $template = $this->loadTemplate($path);
      preg_match_all('/(?:\{{2})(\$[\w]+)(?:\}{2})/um',$template, $matches);
      return $matches[1];
   }
}