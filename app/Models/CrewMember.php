<?php

namespace App\Models;

class CrewMember
{
    private $name;

    private $commander;

    private $team = [];

    public function __construct($name, $commander = null)
    {
        $this->name = $name;
        $this->setCommander($commander);
    }

    public function __toString()
    {
        return $this->name;
    }

    public function setCommander(?CrewMember &$commander) {
        if ($commander !== null && $this->commander != $commander) {
            $this->removeCommander($this->commander);
            $this->commander = &$commander;
            $commander->addCrewMember($this);
        }
    }

    public function removeCommander(?CrewMember $commander) {
        if ($this->commander !== null && $this->commander === $commander)
        {
            $this->commander->removeCrewMember($this);
            $this->commander = null;
        }
    }

    public function addCrewMember(CrewMember &$crewMember) {
        if (!$this->hasCrewMember($crewMember)) {
            $this->team[$crewMember->getName()] = &$crewMember;
            $crewMember->setCommander($this);
        }
    }
    public function removeCrewMember(CrewMember $crewMember) {
        if ($this->hasCrewMember($crewMember)) {
            unset($this->team[$crewMember->getName()]);
            $crewMember->removeCommander($this);
        }
    }

    protected function hasCrewMember(CrewMember $crewMember) {
        return $this->hasCrewMemberByName($crewMember->getName());
    }
    public function hasCrewMemberByName(string $name) {
        return (array_key_exists($name, $this->getTeam()));
    }
    public function getCrewMemberByName(string $name) {
        return $this->team[$name] ?? null;
    }

    public function getCommander() {
        return $this->commander;
    }

    public function getTeam() {
        return $this->team;
    }

    public function getName() {
        return $this->name;
    }

    public function findCrewMember($name) {
        if ($this->getName() === $name) {
            return $this;
        } else {
            foreach ($this->getTeam() as $crewMember) {
                $result = $crewMember->findCrewMember($name);
                if ($result !== null) return $result;
            }
        }
    }

    public function getAllTeam() {
        $result = [];
        if (!empty($this->getTeam())) {
            $team = $this->getTeam();
            $result += $team;
            foreach ($team as $teamMember) {
                $result = array_merge($result, $teamMember->getAllTeam());
            }
        }
        return array_values($result);
    }
}
