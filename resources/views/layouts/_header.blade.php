<div class="container-fulid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link  {{ Request::is('banks') ? 'active' : '' }}"
                                href="{{ route('banks.index') }}">Banks</a>
                            <a class="nav-link {{ Request::is('calculator') ? 'active' : '' }}"
                                href="{{ route('calculator') }}">Calculator</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
