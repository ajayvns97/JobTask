<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\{HasOne ,HasMany};

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'referral_code',
        'refer_by',
        'refer_points',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];




    public function scopeUserAddWithReferral($query , $input){

        if($input['referral'] != Null){
            $ref_status = User::where('referral_code' , $input['referral']);
            if(!$ref_status->exists()){
                return redirect()->back()->with('error', 'Invailid Referral Code');
            }
            $input['refer_by'] = $ref_status->first()->id;
            $count = $ref_status->first()->refer_points + 20;
            $ref_status->update(['refer_points' => $count]);
            $input['refer_points'] = 10;
            }
           
            $input['referral_code'] = strtoupper( Str::random(5));
            $user = User::create($input);
            if(count($input['tech']) > 0){
                foreach ($input['tech'] as $tech) {
                   $status = Technology::create(['user_id'=>$user->id , 'technology' => $tech]);
                }
            }

    }





    // ********************************** Relationship **************************************
    public function referals(): HasOne
    {
        return $this->hasOne(User::class , 'id' , 'refer_by');
    }

    public function tech(): HasMany
    {
        return $this->hasMany(Technology::class);
    }
}
