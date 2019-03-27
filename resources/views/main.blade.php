<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts._head')
    </head>
    <body>
        <div class="">
            @include('layouts._nav-main')
            <div class="app-main">
                @include('layouts._slider-main')
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        @yield('content')
                    </div>
                    @include('layouts._footer')
                </div>
            </div>
        </div>
        @include('layouts._script-main')
        <!-- add scripts -->
        @yield('scripts')
    </body>
</html>
