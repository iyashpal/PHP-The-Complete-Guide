<ul>
    <?php
    foreach ($tasks as $index => $todo) {
        if ($todo->isCompleted()) {
            ?>
            <li><strike><?php echo $todo->getTitle() ?></strike></li>
            <?php
        } else {
        ?>
            <li><?php echo $todo->getTitle() ?></li>
        <?php
        }

    }
    ?>
</ul>
