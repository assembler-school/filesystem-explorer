<h1>Folders</h1>
<ul class="list-unstyled ps-0">
    <li class="border-top my-3"></li>
    <!-- From here -->
    <li class="mb-1" id="folder0">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#folder0-collapse" aria-expanded="true">
            folder0
        </button>
        <div class="collapse show" id="folder0-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <!-- From here -->
                <li class="mb-1 p-2" id="folder1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#folder1-collapse" aria-expanded="false">
                        folder1
                    </button>
                    <div class="collapse" id="folder1-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <!-- From here -->
                            <li class="mb-1 p-2" id="folder2">
                                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#folder2-collapse" aria-expanded="false">
                                    folder2
                                </button>
                                <div class="collapse" id="folder2-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <!-- From here -->
                                        <li class="mb-1 p-2" id="folder3">
                                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#folder4-collapse" aria-expanded="false">
                                                folder4
                                            </button>
                                            <div class="collapse" id="folder4-collapse">
                                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                    <!-- insert button here! -->
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- To here -->
                                    </ul>
                                </div>
                            </li>
                            <!-- To here -->
                        </ul>
                    </div>
                </li>
                <!-- To here -->
            </ul>
        </div>
    </li>
    <!-- To here -->
    <li class="border-top my-3"></li>
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