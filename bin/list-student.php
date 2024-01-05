<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    $studentId = $student->getId();
    $studentName = $student->getName();

    echo "ID: $studentId | Nome: $studentName | Telefones: ";

    echo $student->getPhones()->count() > 0 ?
        implode(
            ' - ',
            $student
                ->getPhones()
                ->map(fn (Phone $phone) => $phone->getNumber())
                ->toArray()
        ) :
        'Nenhum telefone cadastrado';

    echo ' | Cursos: ';

    echo $student->getCourses()->count() > 0 ?
        implode(
            ' - ',
            $student
                ->getCourses()
                ->map(fn (Course $course) => $course->getName())
                ->toArray()
        ) :
        'Nenhum curso cadastrado';

    echo PHP_EOL . PHP_EOL;
}

// $result = $studentRepository->findOneBy(['name' => 'Primeiro Aluno']);
// var_dump($result);

echo 'QTD Registros: ' . $studentRepository->count([]) . PHP_EOL;