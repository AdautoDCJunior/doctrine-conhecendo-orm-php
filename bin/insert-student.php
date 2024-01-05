<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student1 = new Student('Primeiro Aluno', new DateTime('1998-06-23'));
$student1->addPhone(new Phone('(11)11111-1111'));
$student1->addPhone(new Phone('(22)22222-2222'));

$student2 = new Student('Segundo Aluno', new DateTime('1998-06-23'));
$student2->addPhone(new Phone('(33)33333-3333'));
$student2->addPhone(new Phone('(44)44444-4444'));
$student2->addPhone(new Phone('(55)55555-5555'));

$student3 = new Student('Terceiro Aluno', new DateTime('1998-06-23'));
$student3->addPhone(new Phone('(66)66666-6666'));

$student4 = new Student('Quarto Aluno', new DateTime('1998-06-23'));
$student4->addPhone(new Phone('(77)77777-7777'));
$student4->addPhone(new Phone('(88)88888-8888'));
$student4->addPhone(new Phone('(99)99999-9999'));

$entityManager->persist($student1);
$entityManager->persist($student2);
$entityManager->persist($student3);
$entityManager->persist($student4);
$entityManager->flush();