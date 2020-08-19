<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{
    public function index()
    {
      $data = [];//$dataの配列作って
      if(\Auth::check()){//ユーザーがログインしていたら以下の処理実行
        $user = \Auth::user();//ログイン中のユーザを取得して変数代入
        $microposts = $user->microposts()->orderBy('created_at','desc')->paginate(10);//取得したユーザの投稿したものを新しい順にページネイト１０で変数代入
        
        //view先で使う変数を設定
        $data = [
          'user'=>$user,
          'microposts'=>$microposts,
          ];
      }
      return view('welcome',$data);//リターン先はwelcome.blade.php
    }
    
    public function store(Request $request)
    {
      //入力バリテーション設定
      $this->validate($request,[
        'content' => 'required|max:191',
      ]);
      //createメソッドでポストを保存する
      $request->user()->microposts()->create([
            //view先で使う変数を設定
            'content' => $request->content,
        ]);
        
        return back();
    }
    
    public function destroy($id)
    {
        $micropost = \App\Micropost::find($id);

        if (\Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }

        return back();
    }
}
