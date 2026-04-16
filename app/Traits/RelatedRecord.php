<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait RelatedRecord
{
  /**
   * Boot the trait/model.
   */
  protected static function bootRelatedRecord()
  {
 
    if (auth()->check()) {
      static::addGlobalScope('related_records', function (Builder $builder) {

      });
    }
  }

  public static function getTableName()
  {
    return (new self())->getTable();
  }

  public function scopeWithoutRelatedRecord($query)
  {
    return $query->withoutGlobalScope('related_records');
  }


  public function scopeRelatedRecords($query)
  {
    $relatedColumn =  $this->getTableName() . '.user_id';
    return $query->where($relatedColumn, auth()->id());
  }


}
