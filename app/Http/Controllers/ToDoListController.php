<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use App\Models\TodoLog;
use Illuminate\Support\Facades\Auth;

class ToDoListController extends Controller
{
    public function index()
    {
        $data = Todolist::where('user_id', Auth::user()->id)->get();

        return view('home.index', compact('data'));
    }

    public function save(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'title' => $request->title,
            'deadline' => $request->deadline,
        ];

        $save = Todolist::create($data);
        $save->save();

        TodoLog::create(['title' => $request->title.' adlı madde oluşturuldu.'])->save();

        return redirect('/');
    }

    public function edit(Request $request)
    {
        $data = [
            'title' => $request->title,
            'deadline' => $request->deadline,
        ];

        $save = Todolist::where('id', $request->id)->update($data);

        TodoLog::create(['title' => $request->title.' adlı madde düzenlendi.'])->save();

        return redirect('/');
    }

    public function active($id)
    {
        $data = Todolist::where('id', $id)->first();

        if($data->active == '0') {
            $data->update(['active' => '1']);
            TodoLog::create(['title' => $data['title'].' adlı madde tamamlandı olarak işaretlendi.'])->save();
        }
        else {
            $data->update(['active' => '0']);
            TodoLog::create(['title' => $data['title'].' adlı madde tamamlanmadı olarak işaretlendi.'])->save();
        }

        return redirect('/');
    }

    public function delete($id)
    {
        $data = Todolist::where('id', $id)->first();

        TodoLog::create(['title' => $data['title'].' adlı madde silindi.'])->save();

        $data->delete();

        return redirect('/');
    }

    public function logs()
    {
        $data = TodoLog::get();

        return view('log.index', compact('data'));
    }
}
