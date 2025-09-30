<?php

namespace App\Http\Controllers;

use App\DataGenerators\IntegerGenerator;
use App\DataProcessors\DuplicateFinder;
use App\Models\Task1;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;

class TestTaskController extends Controller
{
    public function index() {
        return "index";
    }

    public function task1() {
        $data = Task1::getData();

        $page = Paginator::resolveCurrentPage() ?: 1;
        $perPage = 20;
        $slice = $data->slice(($page - 1) * $perPage, $perPage);

        $paginator = new LengthAwarePaginator(
            $slice, $data->count(), $perPage, $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view('task1', [
            'data' => $paginator
        ]);
    }

    public function cacheTask1() {
        Task1::regenerate();
        return redirect("/tasks/1");
    }


    public function task2()  {
        return view('task2', [
        ]);
    }
    public function task3()  {
        return view('task3', [
        ]);
    }
}
