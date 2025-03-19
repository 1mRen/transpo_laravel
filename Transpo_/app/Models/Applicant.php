<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicant'; // ✅ Ensure correct table name
    protected $primaryKey = 'applicant_id'; // ✅ Custom primary key
    public $timestamps = true; // ✅ Automatically manages created_at & updated_at

    protected $fillable = [
        'user_id', // ✅ Foreign Key to Users
        'full_name',
        'organization_department',
        'position',
        'contact_no',
        'email',
    ];

   
    public $incrementing = true;  // Default behavior
    protected $keyType = 'int';   // Default behavior

    // ✅ Relationship: One Applicant has Many Reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'applicant_id');
    }

    // ✅ Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
