<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2022 &copy; Voler</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a
                    href="https://saugi.me">Saugi</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="{{asset('admin/assets/js/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admin/assets/js/app.js')}}"></script>

<script src="{{asset('admin/assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/dashboard.js')}}"></script>

<script src="{{asset('admin/assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 6000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });
</script>
</body>

</html>