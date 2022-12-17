<?php include("./header.php") ?>
<style>
    .container__body {
        width: 100%;
        height: auto;
    }

    .container__profile {
        width: 80%;
        height: auto;
        margin: 50px auto;
    }

    .container__profile__title {
        width: fit-content;
        height: auto;
        padding: 4px 15px;
        margin: 0 0 18px 0;
        background-color: #397224;
        color: white;
        border-radius: 12px;
        font-size: 20px;
        font-weight: 700;
    }

    .option__posts {
        color: #72af5c;
        margin: 0 4px;
    }

    .option__posts:hover {
        color: #397224;
    }
</style>

<body class="container__body">
    <div class="container__profile">
        <div class="container__profile__title">Bài viết của bạn</div>
        <table class='table table-hover'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Title</th>
                    <th scope='col'>Image</th>
                    <th scope='col'>CreateDate</th>
                    <th scope='col'>Content</th>
                    <th scope='col'>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from posts where user_id = '{$_SESSION['user_id']}'";
                $query = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "
                    <tr>
                        <th scope='row'>{$data['posts_id']}</th>
                        <td>{$data['title']}</td>
                        <td><img src='./assets/img/{$data['image']}' alt=''style='width: 50px; height:auto'></td>
                        <td>{$data['createdate']}</td>
                        <td>" . substr($data['content'], 0, 100) . "</td>
                        <td>
                            <a href='showposts.php?id={$data['posts_id']}' class='option__posts'><i class='fa-solid fa-eye'></i></a>
                            <a href='fixposts.php?id={$data['posts_id']}' class='option__posts'><i class='fa-solid fa-pen-to-square'></i></a>
                            <a href='deleteposts.php?id={$data['posts_id']}' class='option__posts'><i class='fa-solid fa-trash'></i> </a>
                        </td>
                    </tr>  
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<?php include("./footer.php") ?>