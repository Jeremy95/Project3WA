<style>
    @import url('http://fonts.googleapis.com/css?family=Open+Sans');
    a
    {
        color: #7F3734;
        text-decoration: none;
        transition: color 0.25s;
    }
    a:hover
    {
        color: #FFCC5C;
    }
    body
    {
        /* structure */
        margin: 0 auto;
        padding: 1em;
        min-height: 100%;
        width: 80%;
        /* presentation */
        font-family: 'Open Sans', sans-serif;
    }
    html
    {
        /* structure */
        height: 100%;
        /* presentation */
        background-color: #F8FFF2;
    }
    h1
    {
        color: #00968B;
    }
    .order-form-customer
    {
        /* structure */
        padding: 1em 0;
        /* presentation */
        text-align: right;
    }
    .standard-table
    {
        border-collapse: collapse;
        width: 100%;
    }
    .standard-table caption
    {
        /* structure */
        padding: 0.5em 0;
        /* presentation */
        font-size: 1.5em;
        font-weight: bold;
    }
    .standard-table tbody tr
    {
        transition: background-color 0.25s;
    }
    .standard-table tbody tr:nth-child(even),
    .standard-table tfoot tr:nth-child(even)
    {
        background-color: #DFE5DA;
    }
    .standard-table tbody tr:nth-child(odd),
    .standard-table tfoot tr:nth-child(odd)
    {
        background-color: #BABFB5;
    }
    .standard-table tbody tr:hover
    {
        background-color: #998882;
        cursor: default;
    }
    .standard-table tbody tr td,
    .standard-table tfoot tr th,
    .standard-table thead tr th
    {
        padding: 0.25em 0.5em;
    }
    .standard-table tfoot tr,
    .standard-table thead tr
    {
        color: #00968B;
    }
    .standard-table thead tr
    {
        text-align: left;
    }
    .standard-table tfoot tr,
    .standard-table .money-column
    {
        text-align: right;
    }
</style>

<table class="standard-table">
    <caption>Commande n°<?= $orderDetails[0]["id_orders"]; ?></caption>
    <thead>
    <tr>
        <th>Produit</th>
        <th class="money-column">Prix Unitaire</th>
        <th>Quantité</th>
        <th class="money-column">Prix Total</th>
    </tr>
    </thead>
    <!-- Un footer de tableau HTML se positionne AVANT le body ! -->
    <tfoot>
    <tr>
        <th colspan="3">Montant Total</th>
        <th><?= number_format($orderDetails[0]["total_orders"], 2)." €"; ?></th>
    </tr>
    </tfoot>
    <tbody>
    <?php foreach($orderDetails as $value) : ?>
        <tr>
            <td>
                <?= $value["name_products"]; ?>
            </td>
            <td class="money-column">
                <?= number_format($value["prix_products"], 2)." €"; ?>
            </td>
            <td>
                <?= $value["quantity_order_details"]; ?>
            </td>
            <td class="money-column">
                <?php $total = $value["prix_products"]*$value["quantity_order_details"]; ?>
                <?= number_format($total, 2)." €"; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>