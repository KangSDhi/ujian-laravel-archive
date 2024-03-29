<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/vector-pen.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    @stack('css')
</head>

<body>
    <div x-data="baseLayout()" class="container-fluid">
        <div class="row flex-nowrap">
            <aside class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white min-vh-100">
                    <a href="#" class="d-flex align-items-center me-md-auto text-white text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-vector-pen" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z" />
                            <path fill-rule="evenodd"
                                d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z" />
                        </svg>
                        <span class="fs-4 d-none d-sm-inline">Aplikasi Ujian</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a x-data="{ url: '{{ route('siswa.get.dashboard') }}' + '?token=' + localStorage.getItem('token') }" :href="url" class="nav-link"
                                :class="{ 'active': true == {{ request()->routeIs('siswa.get.dashboard') ? 'true' : 'false' }} }">
                                <i class="bi bi-house text-white"></i>
                                <span class="ms-1 d-none d-sm-inline text-white">Beranda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a x-data="{ url: '{{ route('siswa.get.soal') }}' + '?token=' + localStorage.getItem('token') }" :href="url" class="nav-link"
                                :class="{ 'active': true == {{ request()->routeIs('siswa.get.soal') ? 'true' : 'false' }} }">
                                <i class="bi bi-journal text-white"></i>
                                <span class="ms-1 d-none d-sm-inline text-white">Daftar Soal</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#"
                            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-sm-inline mx-1">{{ $user->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
                            <li><a href="#" class="dropdown-item">Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a href="#" class="dropdown-item" @click="logout()">Keluar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const baseLayout = () => {
            return {
                logout() {
                    if (confirm("Apakah Anda Ingin Keluar?")) {
                        const token = localStorage.getItem("token");
                        localStorage.removeItem("token");
                        window.location.href = "{{ url('/siswa/logout') }}" + "/?token=" + token;
                    } else {
                        alert("Batal");
                    }
                }
            }
        }
    </script>
    @stack('script')
</body>

</html>
