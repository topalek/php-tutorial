<?php require base_path('views/parts/head.php') ?>
<?php require base_path('views/parts/nav.php') ?>
<?php require base_path('views/parts/banner.php') ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p><?= $title ?></p>
            <div class="container">
                <?php foreach ($notes as $note): ?>
                <div class="article p-3 mb-2 border rounded-md bg-white">
                    <h3 class="text-2xl font-bold mb-2">
                        <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline"><?= htmlspecialchars($note['title']) ?></a>
                    </h3>
                    <p><?= htmlspecialchars($note['content']) ?></p>
                </div>

                <?php endforeach; ?>
            </div>
            <p class="mt-6">
                <a href="/note/create" class="bg-indigo-500 text-white rounded-md py-3 px-4">Create new</a>
            </p>
        </div>
    </main>
<?php require base_path('views/parts/footer.php') ?>