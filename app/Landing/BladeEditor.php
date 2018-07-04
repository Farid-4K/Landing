<?php

namespace App\Landing;

class BladeEditor
{
   /**
    * @var string - Преобразованная информация
    */
   private $current;
   /**
    * @var string - Загруженный шаблон
    */
   private $template;
   /**
    * @var string - Название файла
    */
   private $file;
   /**
    * @var string - Полный путь до файла
    */
   private $path;

   /**
    * BladeEditor constructor.
    *
    * @param $name - Название шаблона
    */
   public function __construct($name)
   {
      $this->template = file_get_contents(resource_path() . "/views/{$name}.blade.php");
      $this->file = $name;
      $this->path = resource_path() . "/views/{$this->file}.blade.php";
   }

   /**
    * @param string $variable - Искомая переменная
    *
    * @return string - Найденная переменная
    */
   public function findBladeEcho($variable)
   {
      return preg_match_all(
        '/(?:\{{2})(\$' . $variable . ')(?:\}{2})/um', $this->template) ? true
        : false;
   }

   /**
    * @param bool $variant - Если true, вернет переменные без знака доллара.
    *
    * @return array - Все переменные в шаблоне
    */
   public function parseBladeEchos($variant = false) : array
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
   public function replaceBladeEcho($variable, $subject) : bool
   {
      $this->current = preg_replace(
        '/\{{2}\$' . $variable . '\}{2}/um',
        $subject, $this->template, -1, $count);

      return $count ? true : false;
   }

   /**
    * @return bool
    */
   public function save() : bool
   {
      return file_put_contents($this->path, $this->current) ? true
        : file_put_contents($this->path, $this->template) ? true : false;
   }
}
