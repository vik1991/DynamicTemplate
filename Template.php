<!DOCTYPE>
<head xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div id="content">
    <h1><span contenteditable=true>EU</span> MONITORING</h1>
    <p contenteditable="true">Fill in your date range!!!</p>
    <div class="col-md-12 col-sm-12">
        <table class="title">
            <tr>
                <th>Source</th>
                <th>Date</th>
                <th>Issue</th>
            </tr>
        </table>
    </div>
    <div class="col-md-12 col-sm-12" id="list">
        <table style="width:100%" id="myTable">
            <tr>
                <td id="source" contenteditable="true" rowspan="100">Add your Source</td>
            <tr>
                <td id="newDate" contenteditable="true">Add the date</td>
                <td id="newIssue" contenteditable="true">Add the Issue</td>
            </tr>
        </table>
    </div>
</div>
<div class="col-md-12 col-sm-12" id="formButtons">
    <input type="button" id="cloneTable" value="Add new form"/>
    <input type="button" id="addNewDateIssue" value="Add new date"/>
    <button id="jBold">Bold - Unbold</button>
    <button id="print">Preview/Print</button>
</div>
</body>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        table-layout: fixed;
        white-space: pre;
    }

    .title {
        width: 100%;
        background-color: #3f51b55e;
    }

</style>

<script>
    $(document).ready(function () {
        $("#cloneTable").click(function () {
            $("#list:last").clone().insertBefore($("#formButtons"));
            $("#list:first tbody tr td").html("");
        })

        $("#addNewDateIssue").click(function () {
            $("#myTable").each(function () {
                var tds = '<tr>';
                jQuery.each($('tr:last td', this), function () {
                    tds += '<td contenteditable="true" id="newDate"></td>';
                });
                tds += '</tr>';
                if ($('tbody', this).length > 0) {
                    $('tbody', this).append(tds);
                } else {
                    $(this).append(tds);
                }
            });
        })

        $('#jBold').click(function () {
            document.execCommand('bold');
        });

        $('#print').click(function () {
            $('*[id*=list]:visible').each(function (i, el) {
                if (el.innerText.trim() === '') {
                    $(this).remove()
                }
            });
        });
    })
</script>