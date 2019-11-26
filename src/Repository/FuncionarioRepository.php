<?php
namespace App\Repository;

use App\Entity\Funcionarios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Funcionarios|null find($id, $lockMode = null, $lockVersion = null)
 * @method Funcionarios|null findOneBy(array $criteria, array $orderBy = null)
 * @method Funcionarios[]    findAll()
 * @method Funcionarios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuncionarioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Funcionarios::class);
    }
    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function buscaPsicologos(){
        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = "select * from clinica.funcionarios f 
                inner join clinica.acesso a on f.id = a.funcionarios_id
                inner join clinica.perfil p on a.perfil_idperfil = p.idperfil
                where p.idperfil = 4";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}