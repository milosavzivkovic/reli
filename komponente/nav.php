<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container-fluid">
        <form method="post">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/reli/index.php">Početna</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                        Registruj se
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/reli/pages/organizatori.php">Organizator</a></li>
                            <li><a class="dropdown-item" href="/reli/pages/takmicari.php">Takmičar</a></li>
                        </ul>
                    </div>
                </li>
                <?php
                if(!isset($_SESSION["ime"]))
                {
                    echo '<li class="nav-item">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                            Uloguj se
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/reli/pages/login.php?n=1">Organizator</a></li>
                                <li><a class="dropdown-item" href="/reli/pages/login.php?n=2">Takmičar</a></li>
                            </ul>
                        </div>
                    </li>';
                }
                else
                {
                    if(isset($_SESSION["pr"]))
                    {
                        if($_SESSION["pr"]==1)
                        {
                            echo '<li class="nav-item">
                                        <a class="nav-link active" href="/reli/pages/trke.php">Organizuj trku</a>
                                    </li>';
                        }
                    }
                    echo '<li class="nav-item text-right">
                            <a class="nav-link active" href="/reli/utils/logout.php">Odjavite se</a>
                            </li>';
                }
                ?>
            </ul>
        </form>
    </div>
</nav>