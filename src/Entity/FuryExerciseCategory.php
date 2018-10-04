<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FuryExerciseCategoryRepository")
 */
class FuryExerciseCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FuryExercise", inversedBy="categories")
     */
    private $furyExercise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFuryExercise(): ?FuryExercise
    {
        return $this->furyExercise;
    }

    public function setFuryExercise(?FuryExercise $furyExercise): self
    {
        $this->furyExercise = $furyExercise;

        return $this;
    }
}
