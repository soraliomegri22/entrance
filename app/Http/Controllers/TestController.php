<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public static $a;

    public function test()
    {
        self::$a = '変更した';
        return view('test.test1', ['a' => self::$a]);
    }

    public function aaa()
    {
        return view('test.test1', ['a' => self::$a]);
    }

}
