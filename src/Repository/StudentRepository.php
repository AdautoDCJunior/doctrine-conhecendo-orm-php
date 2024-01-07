<?php

namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Student;
use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository
{
    /**
     * @return Student[]
     */
    public function studentsAndCourses(): array
    {
        return $this->createQueryBuilder('stu')
            ->addSelect('pho')
            ->addSelect('cou')
            ->leftJoin('stu.phones', 'pho')
            ->leftJoin('stu.courses', 'cou')
            ->getQuery()
            ->enableResultCache(86400)
            ->getResult();
    }
}