<html>  
    <head>
        <link rel="stylesheet" href="datatables.min.css">
    </head>
    <body>
        <table  id="my-table">
            <thead>
                <tr>
                    <th>Emp ID</th>
                    <th>Advance Amount </th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>                               
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                </tr>
                <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <th>Emp ID</th>
                    <th>Advance Amount </th>
                    <th>Date</th>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
<script src="datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#my-table').DataTable({
            buttons: [
                {
                    extend: 'pdf',
                    text: 'Save current page',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                }
            ]
        });
    });
</script>