<?php

class UserController
{
    public function login()
    {
        global $db;
        session_start();
        $identifier = $_POST['identifier'] ?? '';
        $password = $_POST['password'] ?? '';
        $sql = "SELECT * FROM users WHERE email = :identifier OR school_number = :identifier";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':identifier', $identifier);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];

                header("Location: /home");
                exit;
            } else {
                echo "❌ Şifre yanlış!";
            }
        } else {
            echo "❌ Böyle bir kullanıcı bulunamadı.";
        }
    }
    public function logout(){
    session_unset(); 
    session_destroy();     
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 3600, '/');
    }
    header("Location: /home");
    exit;
    }
    public function profile(){
        global $GeneralViews;
        require_once BASE_PATH . '/app/Views/profile.php';
    }
    public function register()
    {
        global $db;

        // Form verilerini al
        $name       = $_POST['name'] ?? '';
        $surname    = $_POST['surname'] ?? '';
        $email      = $_POST['email'] ?? '';
        $password   = $_POST['password'] ?? '';
        $confirm    = $_POST['password_confirm'] ?? '';
        $number     = $_POST['number'] ?? '';
        $schoolNum  = $_POST['school_number'] ?? '';
        $grade      = is_numeric($_POST['grade']) ? (int) $_POST['grade'] : null;
        $deptID     = isset($_POST['estu_department_id']) && is_numeric($_POST['estu_department_id']) ? (int) $_POST['estu_department_id'] : null;
        $cinema     = isset($_POST['cinema_interest']) ? 1 : 0;
        $theatre    = isset($_POST['theatre_interest']) ? 1 : 0;

        // Şifre eşleşmiyorsa hata ver
        if ($password !== $confirm) {
            echo "❌ Şifreler uyuşmuyor.";
            return;
        }

        // Şifreyi güvenli hale getir
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Veritabanına ekle (status = 0, is_admin = 0)
        $sql = "INSERT INTO users 
                (name, surname, email, password, number, school_number, grade, estu_department_id, cinema_interest, theatre_interest, status, is_admin)
                VALUES 
                (:name, :surname, :email, :password, :number, :school_number, :grade, :dept_id, :cinema, :theatre, 0, 0)";

        $stmt = $db->prepare($sql);

        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':surname', $surname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $hashedPassword);
        $stmt->bindValue(':number', $number);
        $stmt->bindValue(':school_number', $schoolNum);
        $stmt->bindValue(':grade', $grade, $grade === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
        $stmt->bindValue(':dept_id', $deptID, $deptID === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
        $stmt->bindValue(':cinema', $cinema);        
        $stmt->bindValue(':theatre', $theatre);

        if ($stmt->execute()) {
            echo "<script>
                    alert('✅ Başvurunuz başarıyla alındı. Admin onayı bekleniyor.');
                    window.location.href = '/login';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('❌ Kayıt sırasında bir hata oluştu. Lütfen tekrar deneyin.');
                  </script>";
            exit;
        }
}

}
