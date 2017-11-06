<?php

namespace App\Computers\Repository;

use App\Computers\Entity\Computer;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class ComputerRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

   /**
    * Returns a collection of users.
    *
    * @param int $limit
    *   The number of users to return.
    * @param int $offset
    *   The number of users to skip.
    * @param array $orderBy
    *   Optionally, the order by info, in the $column => $direction format.
    *
    * @return array A collection of users, keyed by user id.
    */
   public function getAll()
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('u.*')
           ->from('computers', 'u');

       $statement = $queryBuilder->execute();
       $computersData = $statement->fetchAll();
       foreach ($computersData as $computerData) {
           $computerEntityList[$computerData['id']] = new Computer($computerData['id'], $computerData['nom'], $computerData['marque']);
       }

       return $computerEntityList;
   }

   /**
    * Returns an User object.
    *
    * @param $id
    *   The id of the user to return.
    *
    * @return array A collection of users, keyed by user id.
    */
   public function getById($id)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('u.*')
           ->from('computers', 'u')
           ->where('id = ?')
           ->setParameter(0, $id);
       $statement = $queryBuilder->execute();
       $computerData = $statement->fetchAll();

       return new Computer($computerData[0]['id'], $computerData[0]['nom'], $computerData[0]['marque']);
   }

    public function delete($id)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->delete('computers')
          ->where('id = :id')
          ->setParameter(':id', $id);

        $statement = $queryBuilder->execute();
    }

    public function update($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->update('computers')
          ->where('id = :id')
          ->setParameter(':id', $parameters['id']);

        if ($parameters['nom']) {
            $queryBuilder
              ->set('nom', ':nom')
              ->setParameter(':nom', $parameters['nom']);
        }

        if ($parameters['marque']) {
            $queryBuilder
            ->set('marque', ':marque')
            ->setParameter(':marque', $parameters['marque']);
        }

        $statement = $queryBuilder->execute();
    }

    public function insert($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->insert('computers')
          ->values(
              array(
                'nom' => ':nom',
                'marque' => ':marque',
              )
          )
          ->setParameter(':nom', $parameters['nom'])
          ->setParameter(':marque', $parameters['marque']);
        $statement = $queryBuilder->execute();
    }
}
