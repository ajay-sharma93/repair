<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "services";

    protected $fillable = ['name', 'price', 'description', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'service_id');
    }

    public function name(): Attribute
    {
        return new Attribute(
            get: fn (string $name, array $attributes) => ucwords($name) . '-' . $attributes['price'],
            set: fn (string $name) => strtolower($name),
        );
    }
}
