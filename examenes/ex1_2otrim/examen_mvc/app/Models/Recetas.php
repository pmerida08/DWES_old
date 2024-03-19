<?php

namespace App\Models;

class Recetas extends DBAbstractModel
{
   protected $table = 'recetas';

   protected $id;
   protected $titulo;
   protected $ingredientes;
   protected $elaboracion;
   protected $etiquetas;
   protected $publica;
   protected $imagen;
   protected $valoracion_media;
   protected $idColaborador;
   

   public function getTitulo()
   {
      return $this->titulo;
   }

   public function getIngredientes()
   {
      return $this->ingredientes;
   }

   public function getElaboracion()
   {
      return $this->elaboracion;
   }

   public function getEtiquetas()
   {
      return $this->etiquetas;
   }

   public function getImagen()
   {
      return $this->imagen;
   }
}