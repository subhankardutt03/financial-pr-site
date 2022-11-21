@include('admin.common.header')

<body>
    <div id="app">

        {{------------------------------ Sidebar Start ------------------------}}

        @include('admin.common.sidebar')

        {{---------------------------- Sidebar End ---------------------------}}

        <div id="main">

            {{--------------------------- Navbar Start -------------------------}}

            @include('admin.common.navbar')

            {{--------------------------- Navbar End -------------------------}}

            <div class="main-content container-fluid">
                @yield('body-content')
            </div>
            @include('admin.common.footer')