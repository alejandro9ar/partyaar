<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $locator;

    /**
     * @ORM\OneToMany(targetEntity=Team::class, mappedBy="game")
     */
    private $team;

    /**
     * @ORM\OneToMany(targetEntity=TeamAnswer::class, mappedBy="game")
     */
    private $teamAnswers;

    public function __construct()
    {
        $this->team = new ArrayCollection();
        $this->teamAnswers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocator(): ?string
    {
        return $this->locator;
    }

    public function setLocator(string $locator): self
    {
        $this->locator = $locator;

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeam(): Collection
    {
        return $this->team;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->team->contains($team)) {
            $this->team[] = $team;
            $team->setGame($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->team->contains($team)) {
            $this->team->removeElement($team);
            // set the owning side to null (unless already changed)
            if ($team->getGame() === $this) {
                $team->setGame(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TeamAnswer[]
     */
    public function getTeamAnswers(): Collection
    {
        return $this->teamAnswers;
    }

    public function addTeamAnswer(TeamAnswer $teamAnswer): self
    {
        if (!$this->teamAnswers->contains($teamAnswer)) {
            $this->teamAnswers[] = $teamAnswer;
            $teamAnswer->setGame($this);
        }

        return $this;
    }

    public function removeTeamAnswer(TeamAnswer $teamAnswer): self
    {
        if ($this->teamAnswers->contains($teamAnswer)) {
            $this->teamAnswers->removeElement($teamAnswer);
            // set the owning side to null (unless already changed)
            if ($teamAnswer->getGame() === $this) {
                $teamAnswer->setGame(null);
            }
        }

        return $this;
    }
}
