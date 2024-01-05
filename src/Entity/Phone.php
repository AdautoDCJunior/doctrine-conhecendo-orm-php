<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Phone
{
    #[Id, GeneratedValue, Column]
    private int $id;
    #[ManyToOne(Student::class, inversedBy: 'phones')]
    private Student $student;

    public function __construct(
        #[Column(length: 14)]
        private string $number
    ) { }

    public function getId(): int
    {
        return $this->id;
    }

    public function setStudent(Student $newStudent): void
    {
        $this->student = $newStudent;
    }

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function setNumber(string $newNumber): void
    {
        $this->number = $newNumber;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}