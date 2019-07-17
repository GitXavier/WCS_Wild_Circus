<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShowRepository")
 * @ORM\Table("`show`")
 */
class Show
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="spectacle")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Media", inversedBy="shows")
     */
    private $media;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Program", inversedBy="shows")
     */
    private $program;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->program = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->addSpectacle($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            $user->removeSpectacle($this);
        }

        return $this;
    }

    public function getMedia(): ?media
    {
        return $this->media;
    }

    public function setMedia(?media $media): self
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return Collection|program[]
     */
    public function getProgram(): Collection
    {
        return $this->program;
    }

    public function addProgram(program $program): self
    {
        if (!$this->program->contains($program)) {
            $this->program[] = $program;
        }

        return $this;
    }

    public function removeProgram(program $program): self
    {
        if ($this->program->contains($program)) {
            $this->program->removeElement($program);
        }

        return $this;
    }
}
