<footer class="page-footer font-small blue pt-4"><!-- Footer -->
    <div class="container-fluid text-md-left">
      <div class="row">
        <div class="col-sm-4 padding-footer"><!-- About company -->
          <h5 class="text-uppercase title-footer">Sobre Empresa</h5>
          <p>Empresa dedicada al desarrollo de la tecnología para facilitar las necesidades esenciales y los deseos de la humanidad.</p>
        </div>
        <div class="col-sm-4 padding-footer"><!-- Contact -->
          <div class="row">
            <h5 class="col-md-12 text-uppercase title-footer">Contáctanos</h5>
            <a href="#" class="col-xs-12 link-footer">Dirección de oficina</a>
            <a href="#" class="col-xs-12 link-footer">+51 999555111</a>
            <a href="#" class="col-xs-12 link-footer">Soporte</a>
          </div>
        </div>

        <div class="col-sm-4 padding-footer"><!-- $ RRSS -->
          <h5 class="text-uppercase title-footer">Redes Sociales</h5>
          <ul class="list-unstyled">
            <li>
              <i class="fa fa-facebook-official fa-2x"></i>
              <a href="#!" class="link-footer">Facebook</a>
            </li>
            <li>
              <i class="fa fa-youtube-square fa-2x"></i>
              <a href="#!" class="link-footer">Youtube</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 copy"> Todos los Derechos Reservados  © {{date("Y")}} Copyright: WIN TECNOLOGIES INC S.A.</div>
  </footer><!-- End Footer -->
  <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')     }}"></script>
  <script src="{{ asset('/bower_components/fastclick/lib/fastclick.js') }}"></script>
  <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('/dist/js/demo.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>
  <script src="{{ asset('plugins/DataTable/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('plugins/DataTable/Responsive-2.2.2/js/dataTables.responsive.js') }}"></script>
  <script src="{{ asset('plugins/DataTable/Buttons-1.5.2/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
  <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
  <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
  <script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
  <script src="{{ asset('plugins/jquery/jQuery.print.js') }}"></script>

  @yield('script')
  </body>
</html>
