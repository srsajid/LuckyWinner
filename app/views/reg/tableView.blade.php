<div class="head">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand">Registrations({{$total}})</a>
        </div>
        <div>
            <div class="navbar-form navbar-right">
                <button type="button" class="btn btn-default select-winner button-sm" title="Select winner of the week">
                    <span class="glyphicon glyphicon-user"></span>
                </button>
            </div>
        </div>

    </nav>
</div>

<div class="body">
    <table class="table">
        <colgroup>
            <col style="width: 25%">
            <col style="width: 25%">
            <col style="width: 25%">
            <col style="width: 25%">
        </colgroup>
        <thead>
        <tr>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Phone</th>
            <th>Reg Date</th>
        </tr>
        </thead>
        <tbody>
        <?php $regs->each(function($reg){ ?>
            <tr class="active">
                <td><?php echo $reg->customer->name; ?></td>
                <td><?php echo $reg->customer->email; ?></td>
                <td><?php echo $reg->customer->phone; ?></td>
                <td><?php echo $reg->date; ?></td>
            </tr>
        <?php }); ?>
        </tbody>
    </table>
</div>
<div class="footer">
    <?php
        echo CommonService::paginator($max, $offset, $total);
        echo CommonService::itemPerPage($max);
    ?>
</div>
