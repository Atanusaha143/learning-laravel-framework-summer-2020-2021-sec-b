<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        //Get file path
        $file_path = storage_path().'/data.json';
        //Load the file
        $contents = file_get_contents($file_path);
        //Decode the JSON data into a PHP array.
        $contentsDecoded = json_decode($contents, true);
        //Get specific array
        $data = $contentsDecoded['users'];

        $allType = array(); // all types of user
        foreach($data as $item)
        {
            $currType = $item['type'];
            $check = FALSE; 
            foreach($allType as $type)
            {
                if($type == $currType)
                {
                    $check = TRUE;
                    break;
                }
            }
            if(!$check)
            {
              array_push($allType,$currType);  
            }
        }

        $userCnt = []; // user wise count
        foreach($allType as $currType)
        {
            $cnt = 0;
            foreach($data as $item)
            {
                if($item['type'] == $currType)
                {
                    $cnt += 1;
                }
            }
            $userCnt += [$currType => $cnt];
        }

        $chartData = ""; // for rendering in chart
        foreach($userCnt as $x => $x_value)
        {
            $chartData .= "['".$x."',".$x_value."],";
        }
        $chartData = rtrim($chartData,",");
        return view('chart')->with('chartData',$chartData);
    }
}
