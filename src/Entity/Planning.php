<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanningRepository")
 */
class Planning
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $developer;

    /**
     * @ORM\Column(type="text")
     */
    private $sure;

    /**
     * @ORM\Column(type="text")
     */
    private $zor;

    // Getters & Setters
    public function getId(){
        return $this->id;
    }

    public function getDeveloper(){
        return $this->developer;
    }

    public function setDeveloper($developer){
        $this->developer = $developer;
    }

    public function getSure(){
        return $this->sure;
    }

    public function setSure($sure){
        $this->sure = $sure;
    }

    public function getZor(){
        return $this->zor;
    }

    public function setZor($zor){
        $this->zor = $zor;
    }
}
