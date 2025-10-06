<?php

namespace App\Models;

class Crew
{
    private $commander;

    public function __construct($commanderName)
    {
        $this->commander = new CrewMember("Jean Luc Picard", null);
    }

    public function getCommander() {
        return $this->commander;
    }

    public function findMember($name) {
        if ($this->commander) {
            return $this->commander->findCrewMember($name);
        }
        return null;
    }

    public function getAllTeam($name = null) {
        if ($name !== null) $crewMember = $this->findMember($name);
        else $crewMember = $this->commander;
        return $crewMember?->getAllTeam();
    }


    public function addMember($name, $commander) {
        $commander = $this->findMember($commander);
        if ($commander) new CrewMember($name, $commander);
    }

}
