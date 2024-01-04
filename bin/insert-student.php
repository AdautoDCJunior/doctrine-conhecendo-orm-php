<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student($argv[1], (isset($argv[2]) ? new DateTime($argv[2]) : null));

$entityManager->persist($student);
$entityManager->flush();