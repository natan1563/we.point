<?php

namespace Model;

use DateTime;
use DateTimeZone;
use Helpers\ConnectionTrait;
use Interfaces\InterfaceSql;
use PDO;
use PDOException;

class DataSystem implements InterfaceSql {
  use ConnectionTrait;

  public function listAll(): array {
    $stmt = $this->conn->query('SELECT u.id AS user_id, u.name, u.cargo, p.id AS point_id, p.schedules_points FROM points_scored AS p INNER JOIN users AS u ON p.users_id = u.id WHERE p.deleted_at IS NULL ORDER BY p.schedules_points DESC');
    return $stmt->fetchAll();
  }

  public function insertPoint(int $idUser): bool {
    $stmt = $this->conn->prepare('INSERT INTO points_scored (schedules_points, users_id) VALUES (:schedules_value, :users_id)');
    $stmt->bindValue(":schedules_value", (new DateTime("now", new DateTimeZone('America/Bahia')))->format('Y-m-d H:i:s'));
    $stmt->bindValue(":users_id", $idUser, PDO::PARAM_INT);
    
    try {
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo 'Error ' . $e->getMessage();
      return false;
    }
  }

  public function update(int $idSchedule, int $idUser): bool {
    $stmt = $this->conn->prepare('UPDATE points_scored SET schedules_points = :schedules_value WHERE id = :id_schedule and users_id = :id_user');
    $stmt->bindValue(':schedules_value', (new DateTime("now", new DateTimeZone('America/Bahia')))->format('Y-m-d H:i:s'));
    $stmt->bindValue(':id_schedule', $idSchedule, PDO::PARAM_INT);
    $stmt->bindValue(':id_user', $idUser, PDO::PARAM_INT);

    try {
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo 'Error ' . $e->getMessage();
      return false;
    }
  }

  public function remove(int $idSchedule, int $idUser): bool {
    $stmt = $this->conn->prepare('UPDATE points_scored SET deleted_at = :deleted_now WHERE id = :id_schedule and users_id = :id_user');
    $stmt->bindValue(':deleted_now', (new DateTime("now", new DateTimeZone('America/Bahia')))->format('Y-m-d H:i:s'));
    $stmt->bindValue(':id_schedule', $idSchedule, PDO::PARAM_INT);
    $stmt->bindValue(':id_user', $idUser, PDO::PARAM_INT);

    try {
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo 'Error ' . $e->getMessage();
      return false;
    }
  }
}
