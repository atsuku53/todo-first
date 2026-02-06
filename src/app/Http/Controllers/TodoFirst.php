<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todof;
use App\Http\Requests\TodoRequest;


class TodoFirst extends Controller

{
    public function index()
    {
        $todos = Todof::all();
        // return view('index', compact('todos'));
        return view('index', ['todos' => $todos]);
    }

    public function store(TodoRequest $request)
    {
        $content = $request->input('content');
        // $content = $request->only(['content']);
        $message = $content . 'を作成しました。';
        // Todof::create($content);
        Todof::create(['content' => $content]);
        return redirect('/')->with('message', $message);
    }

    public function update(TodoRequest $request)
    {
        $content = $request->input('content');
        Todof::find($request->input('id'))->update(['content' => $content]);
        $message = $content . 'に更新しました。';
        return redirect('/')->with('message', $message);
    }

    public function delete(Request $request)
    {
        $content = $request->input('content');
        Todof::find($request->input('id'))->delete();
        $message = $content . 'を削除しました。';
        return redirect('/')->with('message', $message);
    }

}
