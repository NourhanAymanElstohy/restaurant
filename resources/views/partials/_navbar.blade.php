<nav class="navbar navbar-expand-lg navbar-dark px-5" style="background-color:#bb2d3b">
    <a class="navbar-brand" href="#" style="font-weight:bold">Pizza Hut 🔥</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link @if ($current == 'index') active @endif" href="/menus/">Chech our
                Awesome Dishes</a>
            <a class="nav-item nav-link @if ($current == 'manage') active @endif" href="/menus/manage">Manage
                Dishes</a>
            <a class="nav-item nav-link @if ($current == 'create') active @endif" href="/menus/create">Create a
                new Dish</a>
        </div>
    </div>
</nav>

<!-- Optimization-Refactor -->
<!--
    Instead of redirecting the user to a different page
    once he click on one of the navigation items,
    we could only the section shown on the screen with some js maniopulation.
    To Be Seen Later
 -->
