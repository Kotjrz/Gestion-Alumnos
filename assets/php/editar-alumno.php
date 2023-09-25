<!DOCTYPE html>
<html>
<head>
    <title>Editar valor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
    // Check if the column name has been passed as a query parameter
    if (isset($_GET['column'])) {
        $columnName = $_GET['column'];
        $idAlumno = $_GET['idalumno'];
        

        // Get the current value of the column
        $oldValue = 'Antiguo Valor';


        echo '<h1>Editar ' . $columnName . ' </h1>';

        echo '<form method="POST" action="lib/update.php">';
        echo '<label for="value">Nuevo Valor:</label>';
        echo '<input type="hidden" name="column" value="' . $columnName . '">';
        echo '<input type="hidden" name="idalumno" value="' . $idAlumno . '">';
        echo '<input type="text" id="value" name="value" placeholder="' . $oldValue . '">';
        echo '<button type="submit">Save</button>';
        echo '</form>';
    } else {
        // If the column name is not provided, display an error message or redirect to another page
        echo 'Error: Column name not specified.';
    }
    ?>
</body>
</html>