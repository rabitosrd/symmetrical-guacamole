<table width="100%">
    <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                Título
            </th>
            <th>
                Texto
            </th>
            <th>
                Autor
            </th>
            <th>
                Data
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $select = $mysqli->query("SELECT * FROM postagens ORDER BY Data ASC");
            $row = $select->num_rows;
            if($row > 0) {
            while($get = $select->fetch_array()) {
        ?>
        <tr>
            <td>
                <?=$get["ID"]?>
            </td>
            <td>
                <?=$get["Titulo"]?>
            </td>
            <td>
                <?=$get["Texto"]?>
            </td>
            <td>
                <?=$get["Autor"]?>
            </td>
            <td>
                <?=$get["Data"]?>
            </td>
        </tr>
        <?php
                }
            } else {
        ?>
        <h4> Não existe nenhuma postagem! </h4>
        <?php
            }
        ?>
    </tbody>
</table>