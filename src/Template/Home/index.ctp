<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Blog Template · Bootstrap v5.2</title>

    <?php echo $this->Html->css("https://getbootstrap.com/docs/5.2/examples/blog/") ?>

    <?php echo $this->Html->css("bootstrap.min.css") ?>

    <!-- Custom styles for this template -->
    <?php echo $this->Html->css("https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap") ?>
    <!-- Custom styles for this template -->
    <?php echo $this->Html->css("blog.css") ?>
</head>

<body>
    <main class="container">
        <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
            <!-- <div class="col-md-6 px-0"> -->
            <iframe class="responsive-iframe" src="files/natura-c07-22.pdf" class="iframe-full" style="width:100%; height:400px;"></iframe>
            <!-- </div> -->
        </div>

        <div class="row mx-md-n5">
            <div class="col py-3 px-md-5">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Produto</strong>
                    </div>
                </div>
            </div>
            <div class="col py-3 px-md-5">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Carrinho</strong>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
</body>

</html>