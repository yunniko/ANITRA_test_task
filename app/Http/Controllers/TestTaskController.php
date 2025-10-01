<?php

namespace App\Http\Controllers;

use App\API\SwApi;
use App\Models\Task1;
use App\Models\Task2;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class TestTaskController extends Controller
{
    public function index() {
        return view('index');
    }

    public function task1() {
        $data = Task1::getData();
        $data->ksort();

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


    public function task2(Request $request)  {
        $api = new SwApi();
        $search = $request->query('search', 'Kashyyyk');
        $task2 = new Task2($api);
        $starships = $task2->getStarshipsByPilotPlanet($search);
        return $starships;
    }
    public function task3()  {
        return view('task3', [
        ]);
    }
}
