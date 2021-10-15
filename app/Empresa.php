<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

      public function pais()
      {
          return $this->belongsTo(Pais::class);
      }

      public function contactos()
      {
          return $this->hasMany(EmpresaContacto::class);
      }

      public function impuestos()
      {
          return $this->hasMany(EmpresaImpuesto::class);
      }

      public function pus()
      {
          return $this->hasMany(Pu::class);
      }

      public function contaperiodos()
      {
          return $this->hasMany(ContaPeriodo::class);
      }

      public function recurrentes()
      {
          return $this->hasMany(ContaRecurrente::class); 
      }

      public function suma()
      {
          return $this->belongsTo(Suma::class);
      }

      public function facturacion()
      {
          return $this->belongsTo(Ciclo::class,'periodofacturacion_id');
      }
      public function impuesto()
      {
          return $this->belongsTo(Ciclo::class,'periodoimpuesto_id');
      }


      public function provincia()
      {
          return $this->belongsTo(Provincia::class);
      }
      
      public function condicionpago()
      {
          return $this->belongsTo(CondicionPago::class);
      }
      public function ciclo()
      {
          return $this->belongsTo(Ciclo::class);
      }

    public function scopeSearch($query, $busca){
        return $query->where('empresa', 'LIKE', "%$busca%")
        ->orWhere('nif', 'LIKE', "%$busca%");
    }
  
}
