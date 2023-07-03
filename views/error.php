<?php require 'views/parts/head.php' ?>
<?php require 'views/parts/nav.php' ?>
<?php require 'Response.php' ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-6">
        <div class="text-4xl text-center font-bold"><?= $statusCode ?></div>
        <p class="text-2xl font-bold text-center"><?= Response::statusMessage($statusCode) ?></p>
    </div>
</main>
<?php require 'views/parts/footer.php' ?>
