<!DOCTYPE html>
<html lang="en">
<body class="d-flex flex-column h-100">
    <div class="container">
        <h1 class="m-2">Error <?=$error->getCode()?> found</h1>
        <?=$error->getMessage()?></p>
        <a href="router.php?c=<?=$_GET['c']?>&a=index" class="btn btn-dark"><- Go back</a>
    </div>
</body>
</html>