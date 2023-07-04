<?php require base_path('views/parts/head.php') ?>
<?php require base_path('views/parts/nav.php') ?>
<?php require base_path('views/parts/banner.php') ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="container">
                <h3 class="text-2xl font-bold mb-2"><?= htmlspecialchars($note['title']) ?></h3>
                <p><?= htmlspecialchars($note['content']) ?></p>
                <a href="/notes" class="mt-6 flex font-bold text-blue-500">Back</a>
                <form method="post" class="mt-6">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <button type="submit" class="text-white bg-red-500 rounded-md py-1 px-2">Delete</button>
                </form>
            </div>
        </div>
    </main>

<?php require base_path('views/parts/footer.php') ?>