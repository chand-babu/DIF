
<nav class="navigation navbar navbar-dark navbar-expand-md">
    <div class="logo ml-4">
        <!-- <div>DAILY IMAGE FUNDA</div> -->
        <img src="<?php echo URL_BASE . 'assets/images/logo/1.png'; ?>" alt="logo" width="50px">
    </div>
    
    <div class="responsive-menu-bar">
        <button type="button" class="navbar-toggler bg-dark" data-toggle="collapse" data-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse justify-content-between text-right" id="nav">
        <ul class="navbar-nav nav-container">
            <li class="nav-item">
                <a class="nav-link px-3" href="<?php echo URL_BASE; ?>">HOME</a>
            </li>

            <li class="nav-item">
                <a class="nav-link px-3" href="<?php echo URL_BASE . 'categories'; ?>">CATEGORIES</a>
            </li>

            <li class="nav-item">
                <a class="nav-link px-3" href="<?php echo URL_BASE . 'galleries'; ?>">GALLERIES</a>
            </li>

            <li class="nav-item">
                <a class="nav-link px-3" href="<?php echo URL_BASE . 'blog'; ?>">BLOG</a>
            </li>

            <li class="nav-item">
                <a class="nav-link px-3" href="<?php echo URL_BASE . 'about'; ?>">ABOUT</a>
            </li>

            <li class="nav-item">
                <div class="n-button" onclick="pophit()">
                    <span>Subscribe</span>
                </div>
            </li>
        </ul>
    </div>
    <div id="add-model"></div>
</nav>