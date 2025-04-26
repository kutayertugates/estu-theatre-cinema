<?php

class AdminController
{
    public function index()
    {
        global $GeneralViews;
        global $db;

        $stmt = $db->prepare("SELECT * FROM users WHERE status = 0");
        $stmt->execute();
        $pendingUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once BASE_PATH . '/app/Views/admin.php';
    }
    public function approve($id)
    {
        global $db;

        $stmt = $db->prepare("UPDATE users SET status = 1 WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: /admin");
        exit;
    }

    public function reject($id)
    {
        global $db;

        $stmt = $db->prepare("UPDATE users SET status = 2 WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: /admin");
        exit;
    }


}
