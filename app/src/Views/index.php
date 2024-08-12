<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .alert {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1050;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Client List</h1>

        <?php if (isset($_GET['message'])) : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['message']) ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td><?= htmlspecialchars($client['id']) ?></td>
                        <td><?= htmlspecialchars($client['name']) ?></td>
                        <td><?= htmlspecialchars($client['phone']) ?></td>
                        <td><?= htmlspecialchars($client['email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($page >2) : ?>
                    <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                    <?php if ($page > 4) : ?>
                        <li class="page-item"><span class="page-link">...</span></li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php
                
                $start = max(1, $page - 2);
                $end = min($totalPages, $page + 4); 

                for ($i = $start; $i <= $end; $i++) : ?>
                    <?php if ($i == $page) : ?>
                        <li class="page-item active"><span class="page-link"><?= $i ?></span></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($page < $totalPages) : ?>
                    <?php if ($page + 4 < $totalPages) : ?>
                        <li class="page-item"><span class="page-link">...</span></li>
                    <?php endif; ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $totalPages ?>"><?= $totalPages ?></a></li>
                <?php endif; ?>
            </ul>
        </nav>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.alert .close').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.delete('message');
                    window.history.replaceState({}, document.title, window.location.pathname + '?page=1' + urlParams.toString());
                });
            });
        });
    </script>
</body>

</html>