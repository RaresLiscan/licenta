<?php
session_start();
// informatii Conectare.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fotografie';
// Încercați să vă conectați folosind informațiile de mai sus.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // Dacă există o eroare la conexiune, opriți scriptul și afișați eroarea.
    exit('Esec Conectare MySQL: ' . mysqli_connect_error());
}
// Acum verificăm dacă datele din formularul de autentificare au fost trimise, isset () va verifica dacă datele există.
if (!isset($_POST['username'], $_POST['password'])) {
    // Nu s-au putut obține datele care ar fi trebuit trimise.
    exit('Completati username si password !');
}

$user = $_POST['username'];
$pass = $_POST['password'];

//Look for a corresponding user
$result = $con->query("SELECT * FROM admins WHERE username='" . $user . "' AND password='" . md5($pass) . "'");
if ($result->num_rows) {
    session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['name'] = $_POST['username'];
    $_SESSION['id'] = $id;
    header('Location: Admin.php');
} else {
    echo 'nu merge';
    //error, incorrect user or password
}

if ($stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?')) {
    // Parametrii de legare (s = șir, i = int, b = blob etc.)
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Stocați rezultatul astfel încât să putem verifica dacă contul există în baza de date.
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Contul există, acum verificăm parola.
        // Notă: nu uitați să utilizați password_hash în fișierul de înregistrare pentru a stoca parolele hash.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has loggedin!
            // Creați sesiuni, astfel încât să știm că utilizatorul este conectat, acestea acționează practic ca cookie-//uri, dar rețin datele de pe server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            echo 'Bine ati venit' . $_SESSION['name'] . '!';
            //if($_POST['username'] == 'admin1234' && $_POST['password']== password_verify($_POST['password'])){
            //header('Location: Admin.php');
            //}else {
            header('Location: /licenta/');
            //}
        } else {

            echo 'Incorrect username sau password!';
        }
    } else {

        echo 'Incorrect username sau password!';
    }
    $stmt->close();
}
