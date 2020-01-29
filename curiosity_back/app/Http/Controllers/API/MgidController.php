<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MgidController extends Controller
{
    public function getUrlData($url, $post_data = false) {
        $curl = curl_init();
         
        curl_setopt ( $curl, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, true );

        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, 0);
        
        curl_setopt($curl, CURLOPT_URL, $url);
        if (is_array($post_data) ) 
        {
            //echo http_build_query($post_data);
            curl_setopt ( $curl , CURLOPT_POST , 1 );
            curl_setopt ( $curl , CURLOPT_POSTFIELDS , http_build_query($post_data) );
        }
        else
        {
            curl_setopt ( $curl , CURLOPT_POST , 0 );
        }
 
        $return_data = curl_exec($curl);
        $data = json_decode($return_data);
        curl_close($curl);
        return $data;
    }

    public function getData(Request $request){        
        $post_data_login = array(
            'email' => 'liusvani@gmail.com',
            'password' => 'Lsbarzaga1*',
        );
        $url_login = 'http://api.mgid.com/v1/auth/token';
        $result = $this->getUrlData($url_login, $post_data_login);

        $url_report = "http://api.mgid.com/v1/publishers/".$result->idAuth."/widget-custom-report?token=".$result->token.
                    "&dateInterval=interval&startDate=2020-01-28&endDate=2020-01-29&siteId=528291&dimensions=date&metrics=shows,realShows,visibilityRate,".
                    "clicks,wages,cpm,vCpm,cpc,ctr";
        $report = $this->getUrlData($url_report);
        return response()->json($report);
    }

}
