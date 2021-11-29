<?php

namespace App\Models;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KYC extends Model
{
    use HasFactory;
    protected $table='kycs';
    public function getAadharNoAttribute($value)
    {
        $aadhar=Crypt::decryptString($value);
        $aadhar=substr($aadhar, 8);
        return '********'.$aadhar;
    }
    public function getPanNoAttribute($value)
    {
        $pan=Crypt::decryptString($value);
        $pan=substr($pan, 6);
        return '******'.$pan;
    }
    public function setPanNoAttribute($value)
    {
        $this->attributes['pan_no']=Crypt::encryptString($value);
    }
    public function setAadharNoAttribute($value)
    {
        $this->attributes['aadhar_no']=Crypt::encryptString($value);
    }
}
