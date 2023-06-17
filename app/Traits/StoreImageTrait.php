<?php

namespace App\Traits;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
trait StoreImageTrait {

    public function verifyAndStoreImage( Request $request, $fieldname = 'img', $directory = 'unknown' ) {

        if( $request->hasFile( $fieldname ) ) {
                $ext = $request->file($fieldname)->getClientOriginalExtension();
                $filename = $directory.'_'.time().Str::random(8).'.'.$ext;
                $request->file($fieldname)->storeAs('public/'.$directory, $filename);
                $mydata = $filename;
                 return $mydata;
        }



    }

}
