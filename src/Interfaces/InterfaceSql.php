<?php 

namespace Interfaces;

interface InterfaceSql
{
    public function listAll():                            array;
    public function insertPoint(int $idUser):             bool;
    public function update(int $idSchedule, int $idUser): bool;
    public function remove(int $idSchedule, int $idUser): bool;
}