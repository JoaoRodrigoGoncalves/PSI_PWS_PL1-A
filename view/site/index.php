<!-- Begin page content -->
<main class="d-flex flex-column h-100">
    <div class="flex-shrink-0">
        <div class="container my-5">
            <h2 class="alert-info p-3">Page Title</h2>
            <div class="row">
                <?php $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." ?>
                <div class="col-4">
                    <h3 class="alert-primary p-2">Title 1</h3>
                    <p><?=$text?>></p>
                </div>
                <div class="col-4">
                    <h3 class="alert-secondary p-2">Title 2</h3>
                    <p><?=$text?>></p>
                </div>
                <div class="col-4">
                    <h3 class="alert-success p-2">Title 3</h3>
                    <p><?=$text?>></p>
                </div>
                <div class="col-12">
                    <h3 class="alert-warning p-2">Title 4</h3>
                    <p><?=$text?>></p>
                </div>
            </div>
        </div>
    </div>
</main>