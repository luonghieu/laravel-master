<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Thujohn\Twitter\Facades\Twitter;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $file = $request->file('file');
        dd($file);

//        if (is_dir($dest = storage_path($this->getStoragePath($type)))) {
//            @chmod($dest, 0777);
//        } else {
//            mkdir($dest, 0777, true);
//        }
//
//        $tmpPath = $csvFile->getPathname();
//
//        $this->removeCharsetFromPathName($tmpPath);
//        $importFile = $csvFile->move($dest, $importFileName);

//        $url = Storage::disk()->getDriver()->getAdapter()->getPathPrefix();
        $status = DB::statement("COPY test FROM 'C:\tmp\sample_data.csv' DELIMITER ',' CSV HEADER;");
        if ($status) {
            return response()->download('/tmp/employees.csv');
        }
        return true;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function file(Request $request)
    {
        try {
            $file = $request->file('file');

            $uniqueFileName = $file->getFilename();
            $fileExtension = $file->getClientOriginalExtension();
            @chmod(storage_path(), 0777);
            $originFileName = sprintf( '%s/%s.%s', storage_path(), $uniqueFileName, $fileExtension);

            copy($file, $originFileName);
//        if (is_dir($dest = storage_path($this->getStoragePath($type)))) {
//            @chmod($dest, 0777);
//        } else {
//            mkdir($dest, 0777, true);
//        }
//
//        $tmpPath = $csvFile->getPathname();
//
//        $this->removeCharsetFromPathName($tmpPath);
//        $importFile = $csvFile->move($dest, $importFileName);

//        $url = Storage::disk()->getDriver()->getAdapter()->getPathPrefix();
            $string = sprintf(
                'psql -h postgres -U enigma enigma_v3 -c "\COPY test(name,email) FROM \'%s\' DELIMITER \',\' CSV HEADER"' ,
                $originFileName
            );
//            dd($string);
            exec($string);
//        $status = DB::statement("COPY test FROM '" .$originFileName . "' DELIMITER ',' CSV HEADER;");
//        dd($status);
//        if ($status) {
//            return response()->download($originFileName);
//        }
//        return true;
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }

    }

    /**
     * Create unique name.
     *
     * @param string $uploadFile Path import file
     *
     * @return string
     */
    public function uniqueFileName($uploadFile)
    {
        return sha1_file($uploadFile) . uniqid();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchTwitter()
    {
        $a = Twitter::getUserTimeline();
        dd($a[4]);
        foreach ($a as $value) {
            dd($value);
        }
        dd($a[0], Twitter::getUsers(['user_id' => '770381832093372417']));
    }
}
