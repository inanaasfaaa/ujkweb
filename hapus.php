<?phpsession_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM products WHERE id=$id");

header("Location: index.php");
?>