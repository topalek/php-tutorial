<?php use Core\Auth;

require base_path('views/parts/head.php') ?>
<?php require base_path('views/parts/nav.php') ?>
<?php require base_path('views/parts/banner.php') ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p>Index page</p>
            <?php print_r(Auth::user()) ?>
            <?php print_r(Auth::id()) ?>
        </div>
    </main>
<?php require base_path('views/parts/footer.php') ?>