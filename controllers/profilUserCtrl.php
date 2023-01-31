<?php
include_once(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/profilUser.php');

if (!empty($_GET) && $_GET['isSent'] == 'ok') { ?>


    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
    <script>
        //    TEST TOAST ! 
    </script>
<?php }



include_once(__DIR__ . '/../views/templates/footer.php');
