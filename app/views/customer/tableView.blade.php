<div class="head">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand">Customers ({{$total}})</a>
        </div>
        <div>
            <div class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" name="searchText" class="form-control" placeholder="Search" value="<?php echo($searchText); ?>">
                </div>
                <button type="submit" class="btn btn-default search">Search</button>
                <a href="{{SR::$baseUrl}}customer/export" target="_blank">
                    <button type="button" class="btn btn-default btn-sm tool-icon create-user" title="Create User">
                        <span class="glyphicon glyphicon-download-alt"></span>
                    </button>
                </a>
            </div>
        </div>
    </nav>
</div>

<div class="body">
    <table class="table">
        <colgroup>
            <col style="width: 5%">
            <col style="width: 15%">
            <col style="width: 20%">
            <col style="width: 20%">
            <col style="width: 25%">
            <col style="width: 15%">
        </colgroup>
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        <?php $customers->each(function($customer){ ?>
            <tr class="active">
                <td><?php echo $customer->id; ?></td>
                <td><?php echo $customer->name; ?></td>
                <td><?php echo $customer->email; ?></td>
                <td><?php echo $customer->phone; ?></td>
                <td><?php echo $customer->address; ?></td>
                <td><?php echo $customer->created_at; ?></td>
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
