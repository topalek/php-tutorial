<?php require base_path('views/parts/head.php') ?>
<?php require base_path('views/parts/nav.php') ?>
<?php require base_path('views/parts/banner.php') ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="container">
                <form method="post" action="/note" class="bg-white p-8 rounded-lg border">
                    <input type="hidden" name="_method" value="patch">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Create note</h2>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="title"
                                           class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                    <div class="mt-2">
                                        <input type="text" name="title" id="title"
                                               value="<?= $_POST['title'] ?? $note['title'] ?>" autocomplete="title"
                                               class="block w-full border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                               placeholder="Some title...">
                                        <?php if (isset($errors['title'])) : ?>
                                            <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-span-full">
                                    <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                                    <div class="mt-2">
                                        <textarea id="content" name="content" rows="3"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $_POST['content'] ?? $note['content'] ?>
                                        </textarea>
                                        <?php if (isset($errors['content'])) : ?>
                                            <p class="text-red-500 text-xs mt-2"><?= $errors['content'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-between">
                        <a href="/notes" class="text-sm font-semibold leading-6 text-indigo-400">Back</a>
                        <div class="flex gap-x-6 justify-end">
                            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                            <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Save
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>
<?php require base_path('views/parts/footer.php') ?>