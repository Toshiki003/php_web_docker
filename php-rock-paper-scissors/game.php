<?php
    session_start();

    // 入力されたユーザー名の取得
    $userName = isset($_POST['user_name']) ? $_POST['user_name'] : '';

    // バリデーション
    $errorMessages = [];
    if (empty($userName)) {
        array_push($errorMessages, "ユーザー名が空です。ユーザー名を入力してください。");
    }

    if (8 < mb_strlen($userName)) {
        array_push($errorMessages, "ユーザー名は8文字以内で入力してください。");
    }

    if (0 < count($errorMessages)) {
        $_SESSION["errors"] = $errorMessages;
        header("location: index.php");
        exit;
    }

    $_SESSION['userName'] = $userName;
?>
<html>
  <?php require_once 'parts/header.php' ?>
  <body>
    <?php require_once 'parts/navbar.php' ?>
    <script lang="javascript">
        function submitUserHand(hand) {
            document.querySelector("#user_hand").value = hand;
            document.querySelector("#select_hand_form").submit();
        }
    </script>
    <div class="container">
      <div>
        <div class="fs-2 blue text-danger">xxxさんの勝ち</div>
        <div class="fs-4">n回のうち、n回勝ちました。</div>
      </div>
      <div class="d-flex justify-content-center align-items-center flex-column mt-2">
        <div class="border rounded p-3 mt-2">
            <img src="images/janken_choki.png" width="100" class="rounded" />
        </div>
        <div class="d-flex justify-content-center fs-2 mt-1 mb-1">
            VS
        </div>
        <div class="border rounded p-3">
            <img src="images/janken_gu.png" width="100" class="rounded" />
        </div>
      </div>
      <form method="post" action="game.php" id="select_hand_form">
        <input type="hidden" name="user_hand" id="user_hand" value="" />
        <div class="d-flex justify-content-evenly mt-5">
            <button class="btn btn-outline-primary" onclick="submitUserHand('rock');">
                <img src="images/janken_gu.png" width="80" class="rounded" />
                </button>
            <button class="btn btn-outline-primary" onclick="submitUserHand('scissors');">
                <img src="images/janken_choki.png" width="80" class="rounded" />
            </button>
            <button class="btn btn-outline-primary" onclick="submitUserHand('paper')">
                <img src="images/janken_pa.png" width="80" class="rounded" />
            </button>
        </div>
      </form>
    </div>
  </body>
</html>
