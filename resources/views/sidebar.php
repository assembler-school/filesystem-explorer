<?php
include "../../app/php/sidebarFillContent.php";
?>

<h1>Folders</h1>
<ul class="list-unstyled ps-0">
    <li class="border-top my-3"></li>
    <!-- From here -->
    <li class="mb-1" id="folder-0" data-file="../../storage">
        <button id="folderButton" class="btn btn-toggle  align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#folder-0-collapse" aria-expanded="true">
            <h1> Root </h1>
        </button>
        <div class="collapse show" id="folder-0-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <!-- From here -->
                <?php
                sidebarFillContent()
                ?>
                <!-- To here -->
            </ul>
        </div>
    </li>
    <!-- To here -->
    <li class="border-top my-3"></li>
    <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add folder
    </button>
    <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
            Account
        </button>
        <div class="collapse" id="account-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-dark rounded">New...</a></li>
                <li><a href="#" class="link-dark rounded">Profile</a></li>
                <li><a href="#" class="link-dark rounded">Settings</a></li>
                <li><a href="#" class="link-dark rounded">Sign out</a></li>
            </ul>
        </div>
    </li>
</ul>