<?php

namespace App\Landing;

class BladeEditor
{
   /**
    * @var string - Преобразованная информация
    */
   public $current;
   /**
    * @var string - Загруженный шаблон
    */
   public $template;
   /**
    * @var string - Название файла
    */
   public $file;
   /**
    * @var string - Полный путь до файла
    */
   public $path;

   /**
    * BladeEditor constructor.
    *
    * @param $name - Название шаблона
    */
   public function __construct($name)
   {
      $this->template = $this->loadTemplate($name);
      $this->file = $name;
      $this->path = resource_path() . "/views/{$this->file}.blade.php";
   }

   /**
    * @param string $variable - Искомая переменная
    * @param bool $variant    - Если true, вернет переменную без знака доллара
    *
    * @return string - Найденная переменная
    */
   public function findBladeEcho($variable, $variant = false)
   {
      preg_match_all(
        '/(?:\{{2})(\$' . $variable . ')(?:\}{2})/um', $this->template,
        $matches);
      foreach ($matches[1] as $key => $val) {
         $variables[$key] = substr($val, 1);
      }

      return $variant ? $variables : $matches[1];
   }

   /**
    * @param bool $variant - Если true, вернет переменные без знака доллара.
    *
    * @return string - Все переменные в шаблоне
    */
   public function parseBladeEchos($variant = false)
   {
      preg_match_all(
        '/(?:\{{2})(\$[\w]+)(?:\}{2})/um', $this->template, $matches);
      foreach ($matches[1] as $key => $val) {
         $variables[$key] = substr($val, 1);
      }

      return $variant ? $variables : $matches[1];
   }

   /**
    * @param string $variable - Заменяемая переменная
    * @param $subject         - На что заменяем
    *
    * @return bool
    */
   public function replaceBladeEcho($variable, $subject)
   {
      $this->current = preg_replace(
        '/\{{2}\$' . $variable . '\}{2}/um',
        $subject, $this->template);

      return $this->current ? true : false;
   }

   /**
    * @return bool
    */
   public function save()
   {
      return file_put_contents($this->path, $this->current) ? true : false;
   }

   /**
    * @param $path - Путь до шаблона
    *
    * @return string
    */
   private function loadTemplate($path)
   {
      $template = file_get_contents(
        resource_path() . "/views/{$path}.blade.php");

      return $template;
   }
}
