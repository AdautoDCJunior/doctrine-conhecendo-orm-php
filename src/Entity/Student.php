<?php

namespace Alura\Doctrine\Entity;

use Alura\Doctrine\Repository\StudentRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity(StudentRepository::class)]
class Student
{
    #[Id, GeneratedValue, Column]
    private int $id;
    #[OneToMany('student', Phone::class, ['persist', 'remove'])]
    private Collection $phones;
    #[ManyToMany(Course::class, inversedBy: 'students')]
    private Collection $courses;

    public function __construct(
        #[Column]
        private string $name,
        #[Column(nullable: true)]
        private ?DateTime $birthdate = null,
    ) {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function addPhone(Phone $phone): void
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    /**
     * @return Collection<Phone>
     */
    public function getPhones(): Collection
    {
        return $this->phones;
    }

    public function enrollInCourse(Course $course): void
    {
        if ($this->courses->contains($course)){
            return;
        }

        $this->courses->add($course);
        $course->addStudent($this);
    }

    /**
     * @return Collection<Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
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