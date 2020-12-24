<ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link" href="/category/create">Add category</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/product/create">Add product</a>
    </li>
</ul>
<form class="d-flex" action="/logout" method="POST">
    @csrf
    <label class="form-label me-md-2">{{ auth()->user()->name }}</label>
    <button class="btn btn-outline-dark btn-sm" type="submit">Logout</button>
</form>