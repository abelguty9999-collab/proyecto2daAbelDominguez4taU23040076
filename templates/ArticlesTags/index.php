<div class="articlesTags index content">
    <h1>Relación Artículos - Etiquetas</h1>

    <table>
        <thead>
            <tr>
                <th>Article ID</th>
                <th>Tag ID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articlesTags as $row): ?>
                <tr>
                    <td><?= h($row['article_id']) ?></td>
                    <td><?= h($row['tag_id']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>