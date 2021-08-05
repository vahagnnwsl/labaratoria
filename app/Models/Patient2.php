<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Patient2 extends Model
{
    use HasFactory;

    const PDF_PATH = 'app2/pdf/';
    const QR_CODE_PATH = 'app2/qrCode/';

    protected $fillable = [
        'full_name',
        'full_name_en',
        'sex',
        'international_doc_num',
        'internal_doc_num',
        'citizenship',
        'date_first_component',
        'date_second_component',
        'medical_institution',
        'certificate_number',
        'hash',
        'status',
        'birth_day'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_first_component' => 'datetime',
        'date_second_component' => 'datetime',
        'birth_day' => 'datetime',
    ];


    /**
     * @return string
     */

    public function getQrCodeAttribute()
    {

        return '/storage/'.self::QR_CODE_PATH . $this->hash . '.svg';
    }


    /**
     * @return string
     */

    public function getPdfAttribute()
    {
        return '/storage/'. self::PDF_PATH . $this->hash . '.pdf';
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
    /**
     * @return mixed
     */
    public function getHideFullNameEnAttribute()
    {
        mb_internal_encoding("UTF-8");

        $exp = explode(' ',$this->full_name_en);


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

    /**
     * @return string
     */
    public function getHideInternalDocNumAttribute(): string
    {

        return $this->get_starred($this->internal_doc_num);
    }

    /**
     * @return string
     */
    public function getHideInternationalDocNumAttribute(): string
    {

        return $this->get_starred($this->international_doc_num);
    }

    function get_starred($str) {

        //make the string an array of letters
        $str = str_split($str);

        //grab the first letter (This also removes the first letter from the array)
        $first = array_shift($str);
        $second = array_shift($str);

        //grab the last letter (This also removes the last letter from the array)
        $last = array_pop($str);
        $penultimate = array_pop($str);
        $penpenultimate = array_pop($str);

        //loop through leftover letters, replace anything not a dash
        //note the `&` sign, this is called a Reference, it means that if the variable is changed in the loop, it will be changed in the original array as well.
        foreach($str as &$letter) {

            //if letter is not a dash, set it to an astrisk.
            if($letter != "-") $letter = "*";
        }

        //return first letter, followed by an implode of characters, followed by the last letter.
        return $first .$second. implode('', $str) .$penpenultimate. $penultimate.$last;

    }

}
