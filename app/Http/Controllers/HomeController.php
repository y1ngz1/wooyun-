<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller{

    /**
     * Test
     *
     * @return \Illuminate\Http\Response
     */
    public function getTest(){
        die;
        $path = base_path().'\data\drops';
        $path2 = base_path().'\data\drops2';
        $dh = opendir($path);
        $num = 0;
        $data = array();
        while (($file = readdir($dh)) !== false) {
            if ($file!='.' && $file!='..'){
                $file = iconv("gbk","utf-8",$file);
                $oldname = str_replace(".html",'',$file);
                $title = $oldname;
                $newname = md5($oldname).'.html';
                $oldname .= '.html';
                echo $path.'\\'.$file.'<br>';
                echo $path.'\\'.$oldname.'<br>';
                echo $path.'\\'.$newname.'<br>';
                if(rename(iconv("utf-8","gbk//ignore",$path.'\\'.$oldname),iconv("utf-8","gbk",$path2.'\\'.$newname))){
                    echo '成功<br>';
                }else{
                    echo '失败<br>';
                }
                echo '-------------------------------------------------------------------------------<br>';
                $num++;
                $data[] = array(
                    'path' => '\data\drops\\'.$newname,
                    'title' => $title,
                    );
            }
        }
        echo '遍历文件数：'.$num.'<br>';
        echo '写入数据量：'.count($data).'<br>';
        DB::table("article")->insert($data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $articles = DB::table("article")->get();
        $str = '';
        foreach ($articles as $key => $article) {
            $str .= '<a href="'.$article->path.'" target="_blank">'.$article->title.'</a><br>';
        }
        echo $str;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
