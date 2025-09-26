<nav class="navbar navbar-expand-lg navbar-dark navbar-navy">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('welcome') }}">
            <i class="bi bi-house-door"></i>
            Inicio
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('products.*') ? ' active' : '' }} d-flex align-items-center gap-1" href="{{ route('products.index') }}">
                        <i class="bi bi-box"></i>
                        Produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('cars.*') ? ' active' : '' }} d-flex align-items-center gap-1" href="{{ route('cars.index') }}">
                        <i class="bi bi-car-front"></i>
                        Carros
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-1" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown" style="border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-gear"></i>
                                    Perfil
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button class="dropdown-item d-flex align-items-center gap-2 w-100 text-start border-0 bg-transparent" type="submit">
                                        <i class="bi bi-box-arrow-right"></i>
                                        Sair
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-1" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Entrar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-1" href="{{ route('register') }}">
                            <i class="bi bi-person-plus"></i>
                            Registrar
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Estilo básico pra combinar com a welcome page + cor azul marinho (adicione no <style> do head ou no app.css) -->
<style>
    .navbar-navy {
        background-color: #001f3f !important; /* Azul marinho escuro (navy blue) */
    }
    
    .navbar-brand i,
    .nav-link i {
        font-size: 1.1rem; /* Ícones um pouquinho maiores pra visibilidade */
    }
    
    .nav-link:hover {
        border-radius: 8px; /* Hover arredondado sutil nos links */
        background-color: rgba(255, 255, 255, 0.1); /* Fundo leve no hover */
        padding: 0.25rem 0.5rem; /* Espaçamento no hover */
    }
    
    .dropdown-item:hover {
        background-color: rgba(0, 123, 255, 0.1); /* Hover azul claro no dropdown */
        border-radius: 8px;
    }
    
    .active {
        border-radius: 8px;
        background-color: rgba(255, 255, 255, 0.2); /* Destaque pro active */
    }
</style>
