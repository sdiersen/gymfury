<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FuryExerciseRepository")
 */
class FuryExercise
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FuryExerciseCategory", mappedBy="furyExercise")
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->name = null;
        $this->description = null;
    }

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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|FuryExerciseCategory[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function getFirstCategoryName(): ?string
    {
        $first = $this->categories->first();
        return $first ? $first->getName() : false;
    }

    public function addCategory(FuryExerciseCategory $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setFuryExercise($this);
        }

        return $this;
    }

    public function removeCategory(FuryExerciseCategory $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            // set the owning side to null (unless already changed)
            if ($category->getFuryExercise() === $this) {
                $category->setFuryExercise(null);
            }
        }

        return $this;
    }
}
