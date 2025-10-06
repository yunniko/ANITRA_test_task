<?php

namespace App\Http\Controllers;

use App\API\SwApi;
use App\Models\Task1;
use App\Models\Task2;
use App\Models\Task3;
use Fhaculty\Graph\Graph;
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

    public function task3() {
        $crew = Task3::buildCrew();
        return view('task3', [
            'data' => $crew
        ]);
    }

    public function task3a(Request $request)  {
        $crew = Task3::buildCrew();
        $commander = $request->query('commander', null);
        return view('task3a', [
            'commanderName' => $commander,
            'crew' => $crew->getAllTeam($commander)
        ]);
    }
    public function task3b(Request $request)  {
        $crew = Task3::buildCrew();
        $commanderName = $request->query('commander', null);
        $targetName = $request->query('target', 'Jean Luc Picard');
        $commander = $crew->findMember($commanderName);
        return view('task3b', [
            'commander' => $commander,
            'infection' => Task3::simulateVirus($commander, $targetName)
        ]);
    }
}
