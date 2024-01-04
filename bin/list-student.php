<?php

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

    echo "ID: $studentId | Nome: $studentName" . PHP_EOL;
}

$result = $studentRepository->findOneBy(['name' => 'Beatriz Suave']);
var_dump($result);

echo $studentRepository->count([]) . PHP_EOL;