<table class="standard-table">
    <thead>
    <tr>
        <th>Order number</th>

        <th>Date order</th>

        <th>Total amount</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($orders as $order) : ?>

        <tr>
            <td><a href=<?= site_url("/order/id/".$order["id_orders"]); ?>><?= $order["id_orders"] ?></a></td>

            <td><?= $order["date_orders"] ?></td>

            <td><?= $order["total_orders"]." €" ?></td>

        </tr>

    <?php endforeach; ?>
    </tbody>
</table>