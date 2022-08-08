<?php
include_once "db/db_board.php";
include_once "db/db_master.php";
session_start();


if (isset($_SESSION["login_user"])) {
    $login_user = $_SESSION["login_user"];
    $nm = $login_user["nm"];
}
if (isset($_SESSION["master_user"])) {
    $login_master = $_SESSION["master_user"];
    $m_nm = $login_master["m_nm"];
}
$page = 1;
if (isset($_GET["page"])) {
    $page = intval($_GET["page"]);
}

$row_count = 10;
$param = [
    "row_count" => $row_count,
    "start_idx" => ($page - 1) * $row_count
];
$paging_count = sel_paging_count($param);
$list = qna_list($param);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/qna.css">
</head>

<body>
    <div id="qna">
        <?php include_once "header.php" ?>

        <main>
            <div class="container">
                <h2 class="title">QnA</h2>
                <table>
                    <caption>
                        <?php if (isset($_SESSION["login_user"])) { ?>
                            <li><a href="qna_write.php">질문하기</li></a>
                        <?php } ?>
                    </caption>
                    <tr class="name">
                        <th width="50px">No</th>
                        <th width="500px">질&nbsp문</th>
                        <th width="150px">작성자</th>
                        <th width="150px">작성일</th>
                    </tr>
                    <tr>

                        <tbody>
                            <?php foreach ($list as $item) { ?>
                                <tr>
                                    <td><?= $item["qust_no"] ?></td>
                                    <td><a href="qna_detail.php?qust_no=<?= $item["qust_no"] ?>"><?= $item["qust_title"] ?></a></td>
                                    <td><?= $item["nm"] ?></td>
                                    <td><?= $item["created_at"] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                </table>
            </div>
            <div class="page">
                <?php for ($i = 1; $i <= $paging_count; $i++) { ?>
                    <span class="<?= $i === $page ? "pageSelected" : "" ?>">
                        <a href="qna.php?page=<?= $i ?>"><?= $i ?></a>
                    </span>
                <?php } ?>
            </div>
        </main>
    </div>