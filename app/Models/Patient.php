<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Patient extends Model
{
    use HasFactory;


    protected $fillable = [
        'full_name',
        'sex',
        'passport_number',
        'hash',
        'date_and_time_of_sample_collection',
        'date_and_time_of_result_report',
        'flight_date',
        'flight',
        'status',
        'type',
        'whats_app',
        'birth_day'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_and_time_of_sample_collection' => 'datetime',
        'date_and_time_of_result_report' => 'datetime',
        'birth_day' => 'datetime',
        'flight_date' => 'datetime'
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->update(['hash' => md5($model->id . $model->creaded_at . time())]);
            QrCode::generate(route('patient.show', $model->hash), storage_path('app/public/qrCode/' . $model->hash . '.svg'));
        });

    }

    /**
     * @return string
     */

    public function getQrCodeAttribute()
    {

        return '/storage/qrCode/' . $this->hash . '.svg';
    }

    /**
     * @return string
     */

    public function getPdfAttribute()
    {
        return '/storage/pdf/' . $this->hash . '.pdf';
    }

    /**
     * @return mixed
     */
    public function getHideFullNameAttribute()
    {
        mb_internal_encoding("UTF-8");

        $exp = explode(' ',$this->full_name);


          $str = '';

          foreach ($exp as $e){
              $s = mb_substr($e, 0,1);


              if (strlen($e) >1){
                  $s .= str_repeat("*", strlen($e)-1);
              }
              $str.= ' '.$s;
          }

        return $str;
    }
}
