            <footer class="main-footer">
                <strong>Copyright &copy; 2022 David Monteiro, Inês Arnauth e João Gonçalves.</strong>
                Todos os Direitos Reservados.
                <div class="float-right d-none d-sm-inline-block">
                    Template por <strong><a href="https://adminlte.io/">AdminLTE</a></strong>
                </div>
            </footer>
        </div>
        <script src="./public/dist/js/faturamais_bo.js"></script>
        <script src="./public/plugins/jquery/jquery.min.js"></script>
        <script src="./public/plugins/popper/umd/popper.js"></script>
        <script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="./public/dist/js/adminlte.js"></script>
        <script src="./public/plugins/chart.js/Chart.min.js"></script>
        <script src="./public/plugins/sweetalert2/sweetalert2.all.min.js"></script>
        <script type="text/javascript">
            // Ativar tooltips no backoffice
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });

            // Atualizar estado da sidebar
            var status = localStorage.getItem("sidebar_collapsed");
            var body = $('body');
            if(status === "true")
            {
                body.removeClass();
                body.addClass('sidebar-mini');
                body.addClass('sidebar-collapse');
            }
            else
            {
                body.removeClass();
                body.addClass('sidebar-mini');
            }
        </script>
        </body>
</html>