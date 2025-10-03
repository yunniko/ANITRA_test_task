<?php
namespace App\Models;

class Task3 {


    public static function buildCrew() {
        $crew = new Crew("Jean Luc Picard");
        $crew->addMember("William Riker", "Jean Luc Picard");
        $crew->addMember("Deana Troi", "Jean Luc Picard");
        $crew->addMember("Jordi La Forge", "Jean Luc Picard");

        $crew->addMember("Worf son of Mog", "William Riker");
        $crew->addMember("Guinan", "William Riker");
        $crew->addMember("Beverly Crusher", "William Riker");

        $crew->addMember("Lwaxana Troi", "Deana Troi");
        $crew->addMember("Reginald Barkley", "Deana Troi");

        $crew->addMember("Mr. Data", "Jordi La Forge");
        $crew->addMember("Miles O'Brien", "Jordi La Forge");

        $crew->addMember("Tasha Yar", "Worf son of Mog");
        $crew->addMember("K'Ehleyr", "Worf son of Mog");

        $crew->addMember("Weslley Crusher", "Beverly Crusher");
        $crew->addMember("Alyssa Ogawa", "Beverly Crusher");

        $crew->addMember("Alexandr Rozhenko", "K'Ehleyr");

        $crew->addMember("Julian Bashir", "Alyssa Ogawa");

        return $crew;
    }
}
