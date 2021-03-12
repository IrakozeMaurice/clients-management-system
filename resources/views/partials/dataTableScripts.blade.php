    <script type="application/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="application/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="application/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $.noConflict();
            $('#tableSearch').DataTable({
                "order": []
            });
        });

    </script>
