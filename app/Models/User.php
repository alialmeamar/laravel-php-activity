<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {

            $user->mainpages()->create([
                'Title' => 'الرؤية',
                'Content' =>'لم يتم الاضافة بعد',

            ]);
            $user->mainpages()->create([
                'Title' => 'الرسالة',
                'Content' =>'لم يتم الاضافة بعد',

            ]);
            $user->mainpages()->create([
                'Title' => 'الاهداف التنظيمية',
                'Content' =>'لم يتم الاضافة بعد',

            ]);
            $user->mainpages()->create([
                'Title' => 'الاهداف الاستراتيجية',
                'Content' =>'لم يتم الاضافة بعد',

            ]);
            $user->toppages()->create([
                'Title' => 'السيرة الذاتية للمدير',
                'Content' =>'لم يتم الاضافة بعد',
                'user_id' => $user->id,
            ]);
            $user->toppages()->create([
                'Title' => ' الهيكل التنضيمي ',
                'Content' =>'لم يتم الاضافة بعد',
                'user_id' => $user->id,
            ]);
            $user->toppages()->create([
                'Title' => ' معوقات العمل  ',
                'Content' =>'لم يتم الاضافة بعد',
                'user_id' => $user->id,
            ]);
            $user->toppages()->create([
                'Title' => '  المنجز الشهري  ',
                'Content' =>'لم يتم الاضافة بعد',
                'user_id' => $user->id,
            ]);
            $user->profile()->create([
                'name' => $user->name,
                'describe' =>'لم يتم الاضافة الوصف بعد',
                'user_id' => $user->id,
                'belongto' =>'1',
                'current_staff' =>'1',
                'total_staff' =>'1',


            ]);

            $user->contactinfo()->create([

                'mobilenum' =>'07800000000 - 07700000000',
                'phonenum' =>'123456 - 123456 ',
                'websitepg' => '/',
                'facebookpg' =>'/',
                'instagrampg' =>'/',
                'youtubepg' =>'/',
                'twitterpg' =>'/',
                'telegrampg' =>'/',
                'tiktokpg' =>'/',
                'user_id' =>$user->id,





            ]);

        });
    }
    public function profile(){
        return  $this->hasOne(profile::class)->orderBy('id', 'ASC');

        }

    public function mainpages(){
        return  $this->hasMany(Main_Pages::class)->orderBy('id', 'ASC');

        }

    public function toppages(){
            return  $this->hasMany(TopPages::class)->orderBy('id', 'ASC');

            }
            public function post(){
                return  $this->hasMany(Posts::class)->orderBy('id', 'ASC');

                }


                public function monthlydeliverable(){
                    return  $this->hasMany(monthlydeliverable::class)->orderBy('id', 'ASC');

                    }

                public function contactinfo(){
                    return  $this->hasOne(contactinfo::class)->orderBy('id', 'ASC');

                    }

    }




