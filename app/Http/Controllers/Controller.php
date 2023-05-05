<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function file()
    {
        $csvFilePath = public_path() . "/import_file_specs.csv";
        $file = public_path() . "/PAYARC_DDF";

        $records = file($file);
        $recordId = 3;
        $record = $records[$recordId];
        $type = substr($record, 17, 2);

//
//        $model =
//        switch ($type){
//            case "p1":
//
//
//        }





//        var_dump($words);
//
//        $id = 13;
//        var_dump($words[$id]);
//        exit();
//
//        foreach ($lines as $word){
//            $word = explode("|", $word);
//            var_dump($word);
//        }
//        exit();

$fields =[];
        $file = fopen($csvFilePath, "r");
        while (($row = fgetcsv($file)) !== FALSE) {


            if (in_array( $row[4],$fields)) {
                continue;
            }
            array_push( $fields, $row[4]."-".$row[5]);



        }

        foreach ($fields as $field) {

            echo $field . "<br>";
        }
    }
}
