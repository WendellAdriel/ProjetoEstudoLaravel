<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'infringing_title',
        'infringing_link',
        'original_link',
        'original_description',
        'template',
        'content_removed',
        'provider_id'
    ];

    public static function open(array $attributes)
    {
        return new static($attributes);
    }

    public function useTemplate($template)
    {
        $this->template = $template;

        return $this;
    }
}
