<?php

include_once(ROOT . "/views/layouts/nav.php");
$select = [
    'Имена по алфавиту',
    'Имена в обратном порядке',
    'Email по алфавиту',
    'Email в обратном порядке',
    'Сначала открытые',
    'Сначала закрытые'
]
?>

<div>
    Сортировка по:
    <select  class="sorting" id="sort">
        <?php
        foreach ($select as $id => $option) {
            if ($closed == $id) {
                    $selected = ' selected';
            } else {
                    $selected = '';
            }
            echo "<option value='$id'{$selected}>" . $option . '</option>';
        }
        ?>
    </select>
</div>

<?php
echo "<table class='table col-xs-6'>";
while ($row = $stmt->fetch()) {
    echo "<tr>";

    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td class='text'>" . $row['text'] . "</td>";
    echo '<td><img src="' . $row['image'] .'" width="160" height="120"></td>';

    if ($row['closed'] == false) {
        $closed = " open";
    } else {
        $closed = " closed";
    }

    if ($this->app->isAdmin) {
        echo "<td><a class='icon icon-pencil editText' id='$row[id]'></a>
            <a class='icon icon-floppy saveText' id='$row[id]'></a></td>";
        echo "<td><a class='icon icon-ok$closed' href='http://tasks.loc/closed/$row[id]/$row[closed]'></a></td>";
    } else {
        echo "<td><i class='icon icon-ok$closed'></i></td>";
    }

    echo "</tr>";
}
echo "</table>";
?>

<script src="/views/js/sorting.js"></script>
<script src="/views/js/editText.js"></script>
