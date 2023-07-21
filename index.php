<?php

$todos = [];
if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
</head>

<body>
    <form action="addtodo" method="post">
        <input name="todo" type="text" placeholder="add todo here">
        <button type="submit">Todo</button>
    </form>

    <div style="display: flex; flex-direction: column;gap: 20px; ">
        <?php foreach ($todos as $todo => $name) : ?>
            <div style="display:flex;">
                <form action="change_status.php" method="post">
                    <input type="hidden" name="todo_name" value="<?php echo $todo ?>">
                    <input class="did" type="checkbox" <?php echo $name['completed'] ? 'checked' : ''  ?>>
                </form>
                <?php echo $todo ?>
                <form action="delete.php" method="post">
                    <input type="hidden" name="todo_name" value="<?php echo $todo ?>">
                    <button>Delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>

<script>
    const checkboxes = document.querySelectorAll('.did')
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            checkbox.parentNode.submit()
        })
    })
</script>

</html>