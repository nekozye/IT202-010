<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT id, name, description, cost, stock, image FROM $ITEM_TABLE_NAME WHERE stock > 0 LIMIT 50");
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}
?>
<script>
    function purchase(item) {
        console.log("TODO purchase item", item);
        alert("It's almost like you purchased an item, but not really");
        //TODO create JS helper to update all show-balance elements
    }
</script>
<div class="h-100">
    <div class="fadeIn large-floating-wrapper-multiple rounded mx-auto align-items-center">
        <div class="container-fluid">
            <h1>Shop</h1>

            <div class="bg-light rounded inrow-class-multi form-floating">
                <div class="text-best-score">
                    Current Churu: <?php echo get_account_balance(get_user_id()); ?> Churus
                </div>
            </div>

            <?php if ($results) : ?>
                <div class="row row-cols-1 row-cols-md-5 g-4">


                    <?php foreach ($results as $item) : ?>
                        <div class="col">
                            <div class="card bg-light">
                                <div class="card-header">
                                    Shooting Game
                                </div>
                                <?php if (se($item, "image", "", false)) : ?>
                                    <img src="<?php se($item, "image"); ?>" class="card-img-top" alt="...">
                                <?php endif; ?>

                                <div class="card-body">
                                    <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                                    <p class="card-text">Description: <?php se($item, "description"); ?></p>
                                </div>
                                <div class="card-footer">
                                    Cost: <?php se($item, "cost"); ?> churu<?php if ($item["cost"]>1): ?>s<?php endif ?>
                                    <button onclick="purchase('<?php se($item, 'id'); ?>')" class="btn btn-primary">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="">
                    No Database!
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<?php
require(__DIR__ . "/../../partials/footer.php");
?>