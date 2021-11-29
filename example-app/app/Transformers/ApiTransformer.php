<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ApiTransformer extends TransformerAbstract
{
    public function transform(Collection $use)
    {
        $cart = array();

        foreach($use as $user) {
            array_push($cart, [
                'Created At'            => (string) $user->created_at,
                'User Name'          => (string) $user->name,
                'User email'         => (string) $user->email,
                
            ]);
          }
        
        return $cart;
    }
    public function addDataResult($data)
    {
        $result=null;
        if($data instanceof User)
        {
            //return ['Result'=>'Your data is added successfully'];
            $result='Your data is added successfully';
        }
        else{
            //return ['Result'=>'Operation Failed'];
            $result='Operation Failed';
        }
        return $result;
    }
}