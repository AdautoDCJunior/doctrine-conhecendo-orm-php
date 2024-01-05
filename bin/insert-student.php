<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student(
    $argv[1],
    (assert($argv[2]) ? new DateTime($argv[2]) : null)
);

for ($i = 3; $i < $argc; $i++) {
    $student->addPhone(new Phone($argv[$i]));
}

$entityManager->persist($student);
$entityManager->flush();