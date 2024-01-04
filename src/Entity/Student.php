<?php

namespace Alura\Doctrine\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Student
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;

    public function __construct(
        #[Column]
        private string $name,
        #[Column(nullable: true)]
        private ?DateTime $birthdate = null,
    ) { }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $newName): void
    {
        $this->name = $newName;
    }

    public function getName(): string
    {
        return $this->name;
    }
}