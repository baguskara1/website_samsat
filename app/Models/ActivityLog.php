<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = [
        'actor_type',
        'actor_id',
        'action',
        'model_type',
        'model_id',
        'old_values',
        'new_values',
    ];

    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
    ];

    public function actor()
    {
        return $this->morphTo();
    }

    public static function log($action, $model = null, $oldValues = null, $newValues = null, $actor = null)
    {
        $actor = $actor ?? (session()->has('admin') ? session('admin') : auth()->user());

        return static::create([
            'actor_type' => $actor ? get_class($actor) : null,
            'actor_id' => $actor ? $actor->id : null,
            'action' => $action,
            'model_type' => $model ? get_class($model) : null,
            'model_id' => $model ? $model->id : null,
            'old_values' => $oldValues,
            'new_values' => $newValues,
        ]);
    }
}
